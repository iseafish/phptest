# phptest
Simple restful application for interview test.
# Basic info:
### PHP architecture: Laravel 5.4
### Language: PHP 5.6
### Databse: Mysql 5.7

# API description:
## 1.Return articles list
GET http://127.0.0.1:8000/api/v1/articles  


## 2.Return article by article id
GET http://127.0.0.1:8000/api/v1/article/{article_id}  


## 3.Return comments by article id
GET http://127.0.0.1:8000/api/sv1/article/{article_id}/comments  


## 4.Create a new article
POST http://127.0.0.1:8000/api/v1/article/create  

hearder Content-Type =>application/json  

body  

  {
    "author":"jason",
    "title":"new article",
    "content":"content"
  }
  
## 5.Create a new comment
POST http://127.0.0.1:8000/api/v1/comment/create  

hearder Content-Type =>application/json  

body  

  {
    "article_id":"2",
    "comment_content":"comment"
  }

## 6.Search related articles and comments 
GET http://127.0.0.1:8000/api/v1/search/{key_word}  

# intall guide  
1.git clone https://github.com/iseafish/phptest.git  
2.cd phptest  
3.composer install  
4.modify the .env file for your mysql connection  
5.php artisan migrate  
6.php artisan serve  
Then enjoy it!

