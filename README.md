## Start

```shell
cp -f ./docker-compose.dev.yml ./docker-compose.yml
cp -f ./.env.example ./.env
make remake
php artisan key:generate
```

## Access

```
Admin
http://127.0.0.1:8401/admin/login
user: admin@filament.example
password: admin

Minio
http://127.0.0.1:8900/browser/local
user: sail
password: password
```

# Health Check Results

Контенер с worker выполнить restart для работы крон задач и очередей
После restart в Health Check Results очереди и крон задания должны быть в статусе OK
