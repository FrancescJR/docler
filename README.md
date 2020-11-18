# Docler Holding Test Interview

Code based on the user story: "As a user, I want to have an ability to see a list of tasks for my day, so that I can do them one by one".

This is the "plain" solution. Check over-engineering-1 for a quite cooler way
(it uses more of symfony, especially doctrine, but it's nicer). It requires docker-compose
to use the application.

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

For local we are using the symfony server:

`make local-start`

otherwise, via docker, execute:

`make docker-start`

### Stop the web server

Use the appropriate command:

`make local-stop`
`make docker-stop`


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

### About Containers

On this branch the Dockerfile just installs and runs symfony server.

See overengineering-1 branch for another version, with docker-compose, and DB and it has also doctrine.


### Extension #2 About Event-driven Applications

About event driven stuff. We could add maybe an event when a task gets completed.

For that I would fire an event on the complete task service after saving the task (to make it
totally async, not relying on doctrine or anything).

the event would be then queued and a consumer eventually might read it. We could maybe update
some "cache" repo of the "completed tasks", so we don't have to go to the DB.

For this second part it gets quite a long feature, to have something looking like a cache, we might
want to add a new container with redis and link it to this docker network.

Then complete the endpoint or make a new one with the completed tasks of the user.

I was thinking on using teh decorator pattern for this cache + fallback to the DB, but the point of the
whole thing would be to just go and check the cache repository and to not have a fall back to the database.

(it's not strictly a cache repo, it can be a repo from a different system or database engine or anything
that we can think of).

So it doesn't make much sense to do it, and implementing the whole thing is already too much I believe.
(If I do it would be in the overengineering2-events branch)

### Extension #3 JWT

Since the user story says "I want to check my tasks", it gives a sense of ownership
and some kind of privacy. We could extend this project adding some kind of security.
One cool way without relying on anything framework-related would be to use JWT.

Passing a JWT on the header request Authorization with a JWT that contains the username
would allow the system to authenticate the user. Both endpoints can add this authorization.
The endpoints URL might be changed to "/me/tasks" and "me/task/completed" to denote that the access is private.

The steps to implement this feature would be:
1- add key pairs in this system.
2- composer require firebase/php-jwt (the most widely used and super simple)
3- create a brand new endpoint, that given a username (or hardcoded), returns a JWT signed with
the private key with the username information.
4 - Now this JWT can be used to pass it in the requests.
5- Make the existing two endpoints to read this header, I would add a new application service
called "getUserFromJWT", if there is something wrong with the JWT then return access denied.
6- Having the user we can pass it in the "getTasks" service,
7- on the complete task service, we should pass now the user and return access denied if the
user is not the same as the one related to the task.

I don't think I am going to implement it (if not though, it would be in the "overengineering3-jwt branch)
