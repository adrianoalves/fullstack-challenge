#Fullstack Example PWA/SPA app

## Overview
A simple example of a PWA/SPA app to show user's weather updates
## Tools:
- Laravel 10
- Redis
- mySQL
- Nginx
- Vuejs
- Vite
- Quasar

## To run the local dev environment:

### API
- Navigate to `/api` folder
- Ensure version docker installed is active on host
- Copy .env.example: `cp .env.example .env`
- Create an account at openweather.org to get a api key.
- Add the Open Weather api key to your env `OPEN_WEATHER_API_KEY`
- Start docker containers `docker compose up` (add `-d` to run detached)
- Connect to container to run commands: `docker exec -it app bash`
  - Make sure you are in the `/var/www/` path
  - Install php dependencies: `composer install`
  - Setup app key: `php artisan key:generate`
  - Migrate database: `php artisan migrate` 
  - Seed database: `php artisan db:seed`
  - Run tests: `php artisan test`
- Visit api: `http://localhost`

### Frontend
- Navigate to `/frontend` folder
- Start docker containers `docker compose up -d`
- access the container terminal `docker-compose exec front bash`
- Install javascript dependencies: `yarn install`
- Run frontend: `yarn quasar dev` (you can add `-m spa|pwa` to run your favorite app flavour)
- Follow the instructions on the terminal to access the proper localhost port.

Don't worry about the "Failed to open default browser" message, Just follow to  http://localhost:8080/ .