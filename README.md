## Install

Run command `make init` or:

1. For Linux - `cp .env.example .env` for Windows - `copy .env.example .env`

2. Configurate `.env` 

3. `docker compose build`

4. `docker compose up -d`

5. `docker exec abelo-app composer install`

6. `docker exec abelo-app php artisan key:generate`

7. `docker exec abelo-app php artisan jwt:secret`

link to http://127.0.0.1:8000

