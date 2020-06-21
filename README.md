# Сайт объявлений


## Installation. Unix

```bash
docker-compose up -d

cp .env.example .env
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
```
