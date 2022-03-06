#!/usr/bin/env python
# coding: utf-8

# In[ ]:


import numpy as np # linear algebra
import pandas as pd # data processing, CSV file I/O (e.g. pd.read_csv)
import sys
# Input data files are available in the "../input/" directory.
# For example, running this (by clicking run or pressing Shift+Enter) will list the files in the input directory

import os
import json
# print(os.listdir("../input"))

# Any results you write to the current directory are saved as output.


# In[ ]:


from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import linear_kernel


# **Load the data from csv files**

# In[ ]:


books = pd.read_csv('./books.csv', encoding = "ISO-8859-1")
books.head()


# In[ ]:


books.shape


# In[ ]:


books.columns


# In[ ]:


ratings = pd.read_csv('./ratings.csv', encoding = "ISO-8859-1")
ratings.head()


# In[ ]:


book_tags = pd.read_csv('./book_tags.csv', encoding = "ISO-8859-1")
book_tags.head()


# In[ ]:


tags = pd.read_csv('./tags.csv')
tags.tail()


# In[ ]:


tags_join_DF = pd.merge(book_tags, tags, left_on='tag_id', right_on='tag_id', how='inner')
tags_join_DF.head()


# In[ ]:


to_read = pd.read_csv('./to_read.csv')
to_read.head()


# **TfidfVectorizer** function from scikit-learn, which transforms** text to feature vectors** that can be used as input to estimator.
# 
#  **Cosine Similarity** to calculate a numeric value that denotes the similarity between two books.

# In[ ]:


tf = TfidfVectorizer(analyzer='word',ngram_range=(1, 2),min_df=0, stop_words='english')
tfidf_matrix = tf.fit_transform(books['authors'])
cosine_sim = linear_kernel(tfidf_matrix, tfidf_matrix)


# In[ ]:


cosine_sim


# A function that returns the 20 most similar books based on the cosine similarity score.

# In[ ]:


# Build a 1-dimensional array with book titles
titles = books['title']
indices = pd.Series(books.index, index=books['title'])

# Function that get book recommendations based on the cosine similarity score of book authors
def authors_recommendations(title):
    idx = indices[title]
    sim_scores = list(enumerate(cosine_sim[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    sim_scores = sim_scores[1:21]
    book_indices = [i[0] for i in sim_scores]
    return titles.iloc[book_indices]


# In[ ]:


authors_recommendations('The Hobbit').head(20)


# Recommend books using the tags provided to the books.

# In[ ]:


books_with_tags = pd.merge(books, tags_join_DF, left_on='book_id', right_on='goodreads_book_id', how='inner')


# In[ ]:


# books_with_tags[(books_with_tags.goodreads_book_id==18710190)]['tag_name']


# In[ ]:


tf1 = TfidfVectorizer(analyzer='word',ngram_range=(1, 2),min_df=0, stop_words='english')
tfidf_matrix1 = tf1.fit_transform(books_with_tags['tag_name'].head(10000))
cosine_sim1 = linear_kernel(tfidf_matrix1, tfidf_matrix1)


# In[ ]:


cosine_sim1


# In[ ]:


# Build a 1-dimensional array with book titles
titles1 = books['title']
indices1 = pd.Series(books.index, index=books['title'])

# Function that get book recommendations based on the cosine similarity score of books tags
def tags_recommendations(title):
    idx = indices1[title]
    sim_scores = list(enumerate(cosine_sim1[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    sim_scores = sim_scores[1:21]
    book_indices = [i[0] for i in sim_scores]
    return titles.iloc[book_indices]


# In[ ]:


tags_recommendations('The Hobbit').head(20)


# Recommendation of books using the authors and tags attributes for better results.
# Creating corpus of features and calculating the TF-IDF on the corpus of attributes for gettings better recommendations.

# In[ ]:


temp_df = books_with_tags.groupby('book_id')['tag_name'].apply(' '.join).reset_index()
temp_df.head()


# In[ ]:


books = pd.merge(books, temp_df, left_on='book_id', right_on='book_id', how='inner')


# In[ ]:


books.head()


# In[ ]:


books['corpus'] = (pd.Series(books[['authors', 'tag_name']]
                .fillna('')
                .values.tolist()
                ).str.join(' '))


# In[ ]:


tf_corpus = TfidfVectorizer(analyzer='word',ngram_range=(1, 2),min_df=0, stop_words='english')
tfidf_matrix_corpus = tf_corpus.fit_transform(books['corpus'])
cosine_sim_corpus = linear_kernel(tfidf_matrix_corpus, tfidf_matrix_corpus)

# Build a 1-dimensional array with book titles
titles = books['title']
images=books['image_url']
authors=books['authors']
indices = pd.Series(books.index, index=books['title'])
 
# Function that get book recommendations based on the cosine similarity score of books tags
def corpus_recommendations(title):
    inner_obj={}
    outer_obj={}   
    num_id=0
    idx = indices1[title]
    sim_scores = list(enumerate(cosine_sim_corpus[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    sim_scores = sim_scores[1:21]
    book_indices = [i[0] for i in sim_scores]
    for i in book_indices:
        num_id+=1
        inner_obj["book_title"]=titles.iloc[i]
        inner_obj["book_image"]=images.iloc[i]
        inner_obj["book_author"]=authors.iloc[i]
        # t=titles.iloc[book_indices]
        # i=images.iloc[book_indices]
        # a=authors.iloc[book_indices]
        # print(t,i,a)
        outer_obj[num_id]=inner_obj
        inner_obj={}
    # print(a.to_json())
    print(json.dumps(outer_obj, indent=4))
    sys.stdout.flush()

corpus_recommendations("The Hobbit")



# In[ ]:


#corpus_recommendations("Twilight (Twilight, #1)")


# In[ ]:


#corpus_recommendations("Romeo and Juliet")


# In[ ]:




