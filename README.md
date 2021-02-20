Link on HEROKU server: https://csci4140-asg-1.herokuapp.com/

Database package: Postgresql

config/db.php: database connection

font/ReaggeOne-Regular.ttf: font for the verification image

discard.php: discard the image by unset the session 
             variable.

editor.php: site for the edition of photo

filter.php: apply Imagick filter on the photo depend   
            on which filter users used

finish.php: when users click finish button in   
            editor page, photo save to the database

index.php: main page of the photo system, which 
           display the photos that users upload

init.php : initialization panel of the database by  
           admin.

init_success.php: the page when admin initialize the  
                  database successfully

login.php: login panel for users and set credentials 
           of users on the cookie when users login successfully.

login_error.php: when users login fail, they will go 
                 to this page and there is a link to lead back to index.php

logout.php: set the users credentials cookies to   
            expire when user logout 

reinit.php : the page that operate the initialization 
            of the database which include record deletion and database creation

upload.php: place that handle the upload of photos by  
            users in the file system. Check any file is uploaded, extension of file and the file name.

Procedure of building:

  First, I deploy my app to heroku server and I connect to the postgresql database server. Then, I create the users database for the login function.
  I studied the usage of GD library that use to generate the verification image.

  After I finished the login system, I begin to study the usage of Imagick to apply the filter on the photos and manage the session to handle the uploaded photos.

  After apply the filter function successfully, I create a photo database for the photo upload. which user can upload their edited photos into the database.

  Then, I studied how to display the photos using pagination. 

  Finally, I did some bug-fixing and did some css-design on the website.

  I also finished the optional part of cancel button, which accomplished by restore the session variable to the image that the user first upload.




