# Journaling service: "NAMI"

This is kata. Orginal description was this:

A SaaS for journaling. Clients get journaling platform and questions/Topics. On the side we push psychiatrist to use this tool
### Users:
thousands clients, hundreds psychiatrist

### Requirements:
* Clients could create their question/topic sets, or subscribed for public ones
* There must be gamification, to keep clients returning to use it
* Every question/topic frequency can be modified per person
* Psychiatrist can enroll client to specific questions/topics set
* Psychiatrist can easily manage questions set for client, can see clients engagement and answers. Can make notes for himself

### Additional Context:
* For client this is a free experience
* We expect fast growth of client base
* In near future we plan to sell this services for business clients as internal mental health/team improvement self-hosted tool
* We plan to add task tracker/management for habit formation

### Requirements
* [docker compose](https://docs.docker.com/compose/install/)

### Setup
1) ```cd docker``` 
1) ```docker composer up -d```
1) ```docker exec -ti app php artisan migrate```
