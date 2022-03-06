#!/usr/bin/env python
# coding: utf-8

# In[1]:


import pandas as pd
pd.set_option('display.max_columns', 25)
import numpy as np
import json

# In[2]:


books = pd.read_csv('/home/ShardulB/BookBarn/GoodBooks/books.csv')
books.head()


# In[7]:


num_of_ratings=10
outer_dict={}
inner_dict={}
while num_of_ratings > 0:
    book = books.iloc[books['ratings_count'].sort_values(ascending=False).head(100).index].sample(
        1, random_state=None)
    inner_dict["book_image"]=book[['image_url']].values[0][0]
    inner_dict["book_title"]=book[['title']].values[0][0]
    inner_dict["book_id"]=str(book[['book_id']].values[0][0])
    inner_dict["book_author"]=book[['authors']].values[0][0]
    #print(inner_dict)
    # rating = input('How do you rate this book on a scale of 1-5? Press n if you have not seen:\n')
    # if rating == 'n':
    #     continue
    # else:
        # rating_one_book = {'user_id':user_id,'book_id':book['book_id'].values[0],'rating':rating}
        # rating_list.append(rating_one_book) 
    outer_dict[num_of_ratings]=inner_dict
    inner_dict={}
    num_of_ratings -= 1
print(json.dumps(outer_dict, indent = 4))    


# In[ ]:




