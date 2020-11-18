# Docler Holding Test Interview

Code based on the user story: "As a user, I want to have an ability to see a list of tasks for my day, so that I can do them one by one".

This is the "plain" solution. Check over-engineering-1 and other branches

## Installation

### Requirements

To use in local, you will need PHP and composer installed, to use via Docker you will need Docker installed.

### Installation

To use in localhost do:

`make local-install`  

(if you have not yet composer installed, you can execute first `sudo make local-install-composer`. This
will install composer in your machine, but it also needs PHP installed. It needs sudo permissions
because it moves the executable file to a directory used to find the shell commands that requires
root access) 

Otherwise, via docker, execute:

`make docker-install`

### Running the web server

For local we are using the symfony server


## Usage

Once you have the web browser running, either locally using symfony server or in the docker. You can
go to 

[GET http://127.0.0.1:8000/v1/user/cesc/tasks](http://127.0.0.1:8000/v1/user/cesc/tasks) and see the list of available tasks.

In order to set a task completed you need to make a PATCH request:

[PATCH http://127.0.0.1:8000/v1/task/{taskId}/complete](http://127.0.0.1:8000/v1/task/{taskId}/complete)

Copy and paste the taskID from the any task from the list before.

In this version there is no persistence, so it's pretty much impossible to save anything.

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

On this branch the Dockerfile just installs and runs symfony server.

see overengineering-1 branch for another version, with docker-compose, and DB and it has also doctrine.



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
