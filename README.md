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

IMPORTANT: if it is the first time you are using it, docker with fpm might start before
the database is actually ready to receive requests and some installations command might break.
If you see the error "Connection refused", that's it. In that case, wait until the server is ready
teh error message will change to "base view not found". When that happens, just stop and start again.
`make stop; make start` and the necessary commands will then execute properly.

### Stopping the web server

`make stop`

## Usage

Once you have the web browser running, either locally using symfony server or in the docker. You can
go to 

[GET http://127.0.0.1:8000/v1/user/cesc/tasks](http://127.0.0.1:8000/v1/user/cesc/tasks) and see the list of available tasks.

In order to set a task completed you need to make a PATCH request:

[PATCH http://127.0.0.1:8000/v1/task/{taskId}/complete](http://127.0.0.1:8000/v1/task/{taskId}/complete)

Copy and paste the taskID from the any task from the list before.

WE have persistence here so if you go to get the tasks again you will see the task completed.

## Testing

There are only unit tests not integration tests.

To execute them you will have had to install the local variant. Then execute

`make test`

## Comments

### About TDD

Just phpunit tests, and not really did TDD, I could correct some mistakes once I did the tests
and it also helps me sometimes decide on how to do some things, (the best option is always the easier
to test).

the only place where I could do something like TDD in this project is in the addTask function for a User
for example to don't allow to add the same task twice (which would make sense). Then do the test first
and then fix the addTask function to be able to pass this test.

On this version, the above would break since there is an index on the mySQL table.

## About DDD

The whole app is coded following domain driven design,

I also tried to be as maximum decoupled from
the framework as possible, see below to know how I tried to make the mot lightweight symfony possible.

Thinks I am using from symfony and other packages:

- dependency injection (services file)
- web server (index.php and initialize kernel)
- annotations for routes
- doctrine
- doctrine migrations
- console
- smyonfy dotenv< -- now I need env variable to connect to the DB (well not really, it's just the habit)

### About Containers

Here we have a nicer way with our docker file. It's actually a docker compose with
3 docker, the php-fpm process, the nginx, and the DB.

The DB uses a known image, for the nginx I am modifying it a litle bit so it can use
the php-fpm docker as upstream, so there is a small dockerfile with a couple of changes 
and its own configuration

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



