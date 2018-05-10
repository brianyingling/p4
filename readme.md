# Project 4: Movie Message Boards
+ By: *Brian Yingling*
+ Production URL: <http://p4.byinglingdwa15.site>


## Database
Primary tables:
  + `users`
  + `movies`
  + `threads`


## CRUD

__Create__
  + Visit <http://p4.byinglingdwa.site>
  + Login by clicking "login", then click "register", then fill out form
  + Search for a movie
  + Click on one of the results
  + Click Create a New Thread
  + Fill out form
  + Observe results
  
__Read__
  + Visit <http://p4.byinglingdwa.site>
  + Search for a movie
  + View results

__Update__
  + Follow the Create steps above
  + Go to that movie page
  + Click on the thread you created
  + On the right, click the "Edit" link
  + Fill out form; observe results
__Delete__
  + Follow the same steps as "update", except click on the "Delete" link and follow instructions

## Outside resources
- Bootstrap: <https://getbootstrap.com/>
- php.net: <http://www.php.net/>
- Laravel: <https://laravel.com/>
- PHP TMDB: <https://github.com/php-tmdb/api> 
- Spatie Laravel Content Security Policy  <https://github.com/spatie/laravel-csp>

## Code style divergences
*List any divergences from PSR-1/PSR-2 and course guidelines on code style*

## Notes for instructor
Last year IMDB.com made the controversial decision to expire their message boards. This was by far my favorite feature of that site and so this inspired me to create my own message board solely for talking about movies. Search for a movie and if it exists, chances are you'll find it! You can leave threads and discuss your favorite scenes with fellow message board members!

The app uses the TMDB API via the PHP TMDB package to make queries for movies. If it appears in search results and the user clicks on the link to visit the details page, the movie will be saved in the database. If the movie already exists in the database, the app will not make an API call to fetch the data. 

Users can register and log in and out; to create, edit, or delete a thread, a user has to be logged in and that user can only edit and delete his or her threads. For security purposes, this app uses the HTTPS security protocol and has the appropriate SSL certificate issued by Let's Encrypt. Additionally, the Spatie's Laravel Content Security Policy package has been download in order to create a policy that modern browsers will find acceptable. Mozilla's Observatory tool has fond the site to be graded with a "B" for security: <https://observatory.mozilla.org/analyze/p4.byinglingdwa15.site>

There are some additional features I wished I had time to implement. I wanted to include replies to threads, where one thread would have many replies. I also wanted to include a user profile page that would show details about their threads and comments. Lastly, I wanted to have an upvote/downvote similar to either Reddit or Facebook. Unfortunately the last 3 weeks have given me time to do this because I've been spending 80-90 hours a week at work. Nonetheless, here is the project at hand.

Thank you for teaching this course. I enjoyed learning Laravel and building out the Foobooks application, and this one.  


