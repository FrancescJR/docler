# Docler Holding Test Interview

Code based on the user story: "As a user, I want to have an ability to see a list of tasks for my day, so that I can do them one by one".

Over-engineering 1, doctrine and docker-compose

## Installation

### Requirements

you will need to have docker-compose and PHP installed.

### Installation

To use in localhost do:

`make install`

### Running the web server

`make start`


## Usage

Once you have the web browser running, either locally using symfony server or in the docker. You can
go to 

[GET http://127.0.0.1:8000/v1/user/cesc/tasks](http://127.0.0.1:8000/v1/user/cesc/tasks) and see the list of available tasks.

In order to set a task completed you need to make a PATCH request:

[PATCH http://127.0.0.1:8000/v1/task/{taskId}/complete](http://127.0.0.1:8000/v1/task/{taskId}/complete)

Copy and paste the taskID from the any task from the list before.

WE have persistence here so status should be saved.

## Testing

There are only unit tests not integration tests.

To execute them you will have had to install the local variant. Then execute

`make local-tests`

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

See overengineering-3 branch for a sample if what could we do via events.
- cache repository with decorator pattern.

One option would be to fire the event "task completed" in the case the endpoint
task completed was called. Then remove this task from the user
in some kind of cache repository that we might have.

### About Containers

Here we have a nicer way with our docker file. It's actually a docker compose with
3 docker, the php-fpm process, the nginx, and the DB.

### About JWT

TODO overengineering 2: 







### Summing up TODO:


2 - docker file
--- completed
3 - JWT authentication (service + repos modification + headers?) -> new branch
4 - On top of branch 3 cache repo with decorator and fire event
5 - Fixtures?? (maybe do it on main branch, dependin, I think Ill pass.)
6 - Complete this readme
done.
