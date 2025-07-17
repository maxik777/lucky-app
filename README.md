Make sure you have Docker installed!!!

Then run:

docker compose up --build

docker compose exec app cp .env.example .env

docker compose exec app composer install

docker compose exec app php artisan key:generate

docker compose exec app php artisan migrate
