# Getting Started

1. Clone this repo && cd into it
1. Run `cp .env.example .env`
1. Run `docker-compose up -d`
1. Visit [http://localhost:8085](http://localhost:8085)
1. Get started with the video series!

# Interacting with the Docker Container

The application is now running _within_ the docker container. There's a mysql container and an application container (onboarding-project). These are basically computers within your computer.

To "get in" to the application container in order to run commands, you'll need to run this:

```bash
# - execute in an interactive terminal (-it)
# - on the onboarding-project container
# - the bash command (to open a prompt)
docker exec -it onboarding-project bash

# Now you can run whatever you like from within the container:
php artisan tinker
```

# Committing

Don't commit to master!

As soon as you start, check out a new branch and do your work there:

```bash
# Something like this:
git checkout -b coreysan/first-video

# Then do something:
git add . && git commit -am "I did something!"
```

You should push once a day at least!
