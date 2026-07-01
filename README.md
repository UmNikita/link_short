Для запуска, выполните следующие команды:
docker compose up -d --build
composer install
cp .env.example .env
php artisan key:generate
docker compose exec app php artisan migrate
