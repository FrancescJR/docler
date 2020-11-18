# Docler Holding Test Interview

## Instructions

Installation execution and testing.

## Comments

### About TDD

Just phpunit tests, and not really did TDD, I could correct some mistakes once I did the tests
and it also helps me sometimes decide on how to do some things, (the best option is always the easier
to test).

the only place where I could do something like TDD in this project is in the addTask function for a User
for example to don't allow to add the same task twice (which would make sense). Then do the test first
and then fix the addTask function to be able to pass this test.

## About DDD

The whole app is coded following domain driven design,

I also tried to be as maximum decoupled from
the framework as possible, see below to know how I tried to make the mot lightweight symfony possible.

Thinks I am using from symfony:

- dependency injection (services file)
- web server (index.php and initialize kernel)
- annotations for routes
  
Trying not to use:
  
- console
- symfony dotenv -> no environment variables.
- symfony-flex

### About Event-driven Applications 

One option would be to fire the event "task completed" in the case the endpoint
task completed was called. Then remove this task from the user
in some kind of cache repository that we might have.

overengineering 4: do the above
- cache repository with decorator pattern.

### About Containers


That's why I'll do 1, docker container I assume... (or a dependency injection container??
in that case I am just using symfony's.)

TODO  "Over engineer 1 "
1 - Should I do a docker file with php-fpm + nginx?
Ok lets do it...

## Questions

TODO overengineering 2: 
  
2 - Authentication via JWT. Maybe add a service
Let's do it - in a different branch

TODO overengineering 3:

3 - Should I pretend that I am using doctrine and do things with fixtures?
Let's do it -in a different branch.




### Summing up TODO:

1 - in memory repos
2 - docker file
--- completed
3 - JWT authentication (service + repos modification + headers?) -> new branch
4 - On top of branch 3 cache repo with decorator and fire event
5 - Fixtures?? (maybe do it on main branch, dependin, I think Ill pass.)
6 - Complete this readme
done.
