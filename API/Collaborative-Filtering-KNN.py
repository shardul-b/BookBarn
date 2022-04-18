#!/usr/bin/env python
# coding: utf-8

# In[1]:


import pandas as pd
pd.set_option('display.max_columns', 25)
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
from surprise import Dataset
from surprise import Reader
from surprise import SVD
from surprise.prediction_algorithms import knns
from surprise.model_selection import train_test_split, KFold, GridSearchCV
from surprise.similarities import cosine, pearson
from surprise import accuracy
from surprise import dump
import os
import sys
import ast
import json
import random
from collections import defaultdict
from time import time


# Dataset: [GoodBooks10k](https://www.kaggle.com/alexanderfrosati/goodbooks-10k-updated)

# In[2]:


# load and check first entries of ratings dataset
ratings = pd.read_csv('/home/ShardulB/BookBarn/ratings1.csv')
# ratings.head()


# In[3]:


# check dataset information
# ratings.info()


# In[4]:


# ratings.describe()


# In[5]:


# check if we have any null values
# ratings.isna().sum()


# In[6]:


# load and check first entries of dataframe with information on books
books = pd.read_csv('/home/ShardulB/BookBarn/GoodBooks/books.csv')
# books.head()


# In[7]:


# books.info()


# In[8]:


# books.describe()


# In[9]:


# books.isna().sum()


# In[10]:


# check number of unique users and items
# print(f'We have a total of {len(ratings)} ratings.')
# print(f'Number of unique users: {ratings.user_id.nunique()}')
# print(f'Number of unique items(books): {ratings.book_id.nunique()}')


# In[11]:


# check user ratings distribution per user
sns.displot(ratings.user_id.value_counts());
sns.set_style('white')
sns.despine(left=True)
plt.title('Distribution of Ratings per User', fontsize=16)
plt.yticks([])
plt.xlabel('Number of Ratings', fontsize=12)
# plt.show();


# In[12]:


# print(f'The mean number of ratings by user is {ratings.user_id.value_counts().mean()}')
# print(f'The median number of ratings by user is {ratings.user_id.value_counts().median()}')
# print(f'The maximum number of ratings by user is {ratings.user_id.value_counts().max()}')
# print(f'The minimum number of ratings by user is {ratings.user_id.value_counts().min()}')


# In[13]:


# check ratings distribution per book
plt.figure(figsize=(20,4))
sns.histplot(ratings.book_id.value_counts());
sns.set_style('white')
sns.despine(left=True)
plt.title('Distribution of Ratings by Book', fontsize=16)
plt.yticks([])
plt.xlabel('Number of Ratings', fontsize=12)
# plt.show();


# In[14]:


# print(f'The mean number of ratings per book is {ratings.book_id.value_counts().mean()}.')
# print(f'The median number of ratings per book is {ratings.book_id.value_counts().median()}.')
# print(f'The maximum number of ratings per book is {ratings.book_id.value_counts().max()}.')
# print(f'The minimum number of ratings per book is {ratings.book_id.value_counts().min()}.')


# In[15]:


# get book ids for most ratings and least ratings
# ratings.book_id.value_counts()


# In[16]:


books[['book_id','title','authors','ratings_count','average_rating']].loc[books['book_id'].isin([1,2,4,3,5])]


# In[17]:


books[['book_id','title', 'authors','ratings_count',
       'average_rating']].loc[books['book_id'].isin([7803,9345,9486,1935,9315])]


# In[18]:


# check number of books in books metadata dataset
books.book_id.nunique()


# In[19]:


# check total number of ratings from books metadata dataframe
books.ratings_count.sum()


# In[20]:


ratings.rating.value_counts()


# In[21]:


# plot ratings range distribution
count = ratings.rating.value_counts()
count.index
sns.barplot(x=count.index, y=count, palette='rocket')
sns.despine()
plt.title('Distribution of Ratings', fontsize=14)
plt.ylabel('Number of Reviews')  
plt.xlabel('Rating'); 


# In[22]:


# check users who give more 5 stars ratings and number of such ratings given by each user
users_most5_ratings = ratings.loc[(ratings.rating == 5)].groupby('user_id').size().sort_values(ascending=False)
users_most5_ratings.head(10)


# In[23]:


# check users who give more 1 star ratings and number of such ratings given by each user
users_most1_ratings = ratings.loc[(ratings.rating == 1)].groupby('user_id').size().sort_values(ascending=False)
users_most1_ratings.head(10)


# In[24]:


# check what are the top 10 best rated books
best_rated = books['average_rating'].sort_values(ascending=False)
books[['title', 'authors']].iloc[best_rated.head(10).index]


# In[25]:


# check what are the top 10 worst rated books
worst_rated = books['average_rating'].sort_values()
books[['title', 'authors']].iloc[worst_rated.head(10).index]


# In[26]:


# check what are the top 10 books with the most 5 stars ratings
most_5stars = books['ratings_5'].sort_values(ascending=False)
most_5stars = books[['title','authors']].iloc[most_5stars.head(10).index]
most_5stars


# In[27]:


# check what are the top 10 books with the most 1 star ratings
most_1star = books['ratings_1'].sort_values(ascending=False)
most_1star = books[['title','authors']].iloc[most_1star.head(10).index]
most_1star


# In[28]:


# one book is in both top 10 most liked and most disliked - call it a polarizer!
most_5stars.merge(most_1star)


# 
# 
# ## Modeling with surprise library
# 
# ### Memory-based Collaboration Filtering

# In[29]:


# define reader
reader = Reader(rating_scale=(1, 5))

# load dataframe into correct format for surprise library
data = Dataset.load_from_df(ratings[['user_id', 'book_id', 'rating']], reader)


# In[30]:


# check it's the right data type
type(data)


# Here we will split the data to have a training and testing set, and to avoid data leakage.

# In[31]:


# Split into train and test set
trainset, testset = train_test_split(data, test_size=0.2, random_state=0)


# In[32]:


# check size of test set and have a look at how one sample looks like
# print(len(testset))
# print(testset[0])


# In[33]:


# confirm number of items and users in data
# print('Number of users: ', trainset.n_users, '\n')
# print('Number of items: ', trainset.n_items, '\n')


# In[34]:


# define a cosine metric for item-item
# sim_cos = {'name':'cosine', 'user_based':False}


# In[35]:


# define and fit a basic KNN model with a cosine metric
# basic = knns.KNNBasic(sim_options=sim_cos)
# basic.fit(trainset)


# In[36]:


# make predictions
# predictions = basic.test(testset)


# In[37]:


# check accuracy
# accuracy.rmse(predictions)


# In[38]:


# define fit and evaluate a KNN basic model with pearson correlation metric
sim_pearson = {'name':'pearson', 'user_based':False}
basic_pearson = knns.KNNBasic(sim_options=sim_pearson)
basic_pearson.fit(trainset)
predictions = basic_pearson.test(testset)
accuracy.rmse(predictions)


# In[39]:


# KNN with means model, which takes the mean ratings of each item into account
# sim_pearson = {'name':'pearson', 'user_based':False}
# knn_baseline = knns.KNNWithMeans(sim_options=sim_pearson)
# knn_baseline.fit(trainset)
# predictions = knn_baseline.test(testset)
# accuracy.rmse(predictions)


# A KNN Baseline with a pearson baseline similarity metric.

# In[40]:


# KNN baseline model, which takes into account a baseline rating (global mean)
sim_pearson_baseline = {'name': 'pearson_baseline','user_based':False}#'shrinkage':50, 'min_support':5, 
knn_baseline = knns.KNNBaseline(sim_options=sim_pearson)
knn_baseline.fit(trainset)
predictions = knn_baseline.test(testset)
accuracy.rmse(predictions)


# In[41]:


# define a base singular value decomposition model
svd = SVD()

# fit and test algorithm
predictions = svd.fit(trainset).test(testset)

# evaluate model
# print(accuracy.rmse(predictions))


# (https://surprise.readthedocs.io/en/stable/FAQ.html#how-to-save-some-data-for-unbiased-accuracy-estimation). 

# In[42]:


raw_ratings = data.raw_ratings

# shuffle ratings
random.shuffle(raw_ratings)

# A = 90% of the data, B = 20% of the data
threshold = int(.8 * len(raw_ratings))
A_raw_ratings = raw_ratings[:threshold]
B_raw_ratings = raw_ratings[threshold:]


# In[43]:


data.raw_ratings = A_raw_ratings  # data is now the set A


# In[44]:


t = time()
# define parameter grid and fit gridsearch on set A data
param_grid = {'n_epochs': [5, 10], 'lr_all': [0.002, 0.005]}
grid_search = GridSearchCV(SVD, param_grid, measures=['rmse'], cv=3)
grid_search.fit(data)

# print(time()-t)


# In[45]:


best_svd = grid_search.best_estimator['rmse']

# retrain on the whole set A
trainset = data.build_full_trainset()
best_svd.fit(trainset)


# In[46]:


# Compute biased accuracy on A
predictions = best_svd.test(trainset.build_testset())
# print('Biased accuracy on A,', end=' ')
accuracy.rmse(predictions)


# In[47]:


# Compute unbiased accuracy on B (testset)
testset = data.construct_testset(B_raw_ratings)  
# testset is now the set B
predictions = best_svd.test(testset)
# print('Unbiased accuracy on B,', end=' ')
# accuracy.rmse(predictions)


# In[48]:


# give file a name
file_name = os.path.expanduser('~/best_svd')


# In[49]:


# save best model
dump.dump(file_name, algo=best_svd)


# In[50]:


# load saved model
_, best_svd = dump.load(file_name)

# Getting recommendations for new users
print("$")

def get_recs(df=ratings, metadata=books, num_of_rec=3, num_of_ratings=10):
    
    ''' 
    Function takes:
    a dataframe with ratings, 
    a dataframe with metadata on items,
    a number of recommendations wanted - default is 3, and
    a number of ratings to be asked of user - default is 10.
    Returns a list with recommendations based on user ratings and model loaded.
    '''
  #Name and Id from FrontEnd  
#     # get user inputs - request name and ratings
#     user_name = input('Please type in your first name:\n')
    
#     # estabilish a new unique user_id
#     user_id = ratings.user_id.nunique()+1
    rating_list =ast.literal_eval(sys.argv[1]) 
    # print(rating_list)  
    user_id=sys.argv[2]
    # print(user_id)
    # print(rating_list)
    # lol=ast.literal_eval(sys.argv[1])
    # print(lol)
    # print(sys.argv[2])
    # tranform new user ratings into dataframe
    df = pd.DataFrame(rating_list)
    
    # append to ratings data
    new_ratings_df = ratings.append(df,ignore_index=True)
    
    # define reader
    reader = Reader(rating_scale=(1, 5))
    
    # load new data into surprise form
    new_data = Dataset.load_from_df(new_ratings_df[['user_id', 'book_id', 'rating']],reader)
    
    # load best model previously saved
    _, best_svd = dump.load(file_name)
    
    # fit new data
    best_svd.fit(new_data.build_full_trainset())

    # make predictions for the user
    list_of_books = []
    for book_id in new_ratings_df['book_id'].unique():
        list_of_books.append((book_id, best_svd.predict(user_id, book_id)[3]))
        
    # order the predictions from highest to lowest rated
    ranked_predictions = sorted(list_of_books, key=lambda x:x[1], reverse=True)
    
    # print n number of recommentations
#     print(f'Recomendations for {user_name}: ')
    outer_dict={}
    book_dict={}
    id_count=0
    for idx, rec in enumerate(ranked_predictions):
        id_count+=1
        recommended_book=books.loc[books['book_id'] == int(rec[0])]
        # title = recommended_book['title']
        # recommend_book_id=recommended_book['book_id']
        # recommend_book_isbn=recommended_book['isbn']
        # print('Recommendation # ', idx, ': ')
        book_dict["book_id"]=int(recommended_book['book_id'].values[0])
        book_dict["book_title"]=str(recommended_book['title'].values[0])
        book_dict["book_author"]=str(recommended_book['authors'].values[0])
        book_dict["isbn"]=str(recommended_book['isbn'].values[0])
        book_dict["book_image"]=str(recommended_book['image_url'].values[0])
        outer_dict[id_count]=book_dict
        book_dict={}
        num_of_rec-= 1
        if num_of_rec == 0:
            break
    print(json.dumps(outer_dict,indent=4))
    sys.stdout.flush()

# In[53]:


get_recs(num_of_rec=10, num_of_ratings=8)


# In[ ]:

#[{'user_id': 847, 'book_id': 33, 'rating': '1'}, {'user_id': 847, 'book_id': 91, 'rating': '3'}, {'user_id': 847, 'book_id': 64, 'rating': '4'}]



