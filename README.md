## Переустановка проекта
```
cp -n .env.example .env
docker-compose up -d --build

docker exec -it validation-php-fpm-1 composer install
```

## Запуск тестов
```
docker exec -it validation-php-fpm-1 vendor/bin/phpunit tests
```
