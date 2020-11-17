# Docler Holding Test Interview


## Questions

To "Over engineer"
- Should I do a docker file with php-fpm?

- Should I pretend that I am using doctrine and do things with fixtures?

- Should I implement some kind of event dispatch (with queues -> do something) ?
Maybe that is too much for real.


## Comments

for the web server I am just using symfony. 

Thinks I am using from symfony:
- dependency injection (services file)
- web server (index.php and initialize kernel)  
- annotations for routes
Trying not to use:
- console
- symfony dotenv -> no environment variables.

Since I have to return  http responses, I am using
symfony's component, 
