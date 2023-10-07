## Tips

- Read this [Makefile](https://github.com/webnitros/laravel-docker-artelamp/blob/master/Makefile).
- Read this [Wiki](https://github.com/ucan-lab/docker-laravel/wiki).

## Container structures

```bash
├── app
├── web
└── db
└── mailhog
```

### app container

- Base image
    - [php](https://hub.docker.com/_/php):7.4.30-fpm-bullseye
    - [composer](https://hub.docker.com/_/composer):2.2

### web container

- Base image
    - [nginx](https://hub.docker.com/_/nginx):1.22

### db container

- Base image
    - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0

### mailhog container

- Base image
    - [mailhog/mailhog](https://hub.docker.com/r/mailhog/mailhog)
