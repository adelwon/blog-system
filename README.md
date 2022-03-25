## About Blog-System

Platform for publishing posts. Available to any user who can easily create posts. Blog-system consists of the
following subsystems: administrative panel, personal account of the author, public part with search. There is
authorization/registration. User must verify their own email address after signing up for a new account. The
administrator can ban authors. Before publishing, the administrator moderates the post.

## Run composer

```
composer install
```

## Create .env from env.example

For mail service use https://mailtrap.io/inboxes

## Build and run docker

```
docker-compose build && docker-compose up -d
```

## Creating a User for MySQL

```
docker-compose exec db bash

www@4f1556522cd2: mysql -u root -p

mysql> GRANT ALL PRIVILEGES  ON blog.* TO 'root'@'db' IDENTIFIED BY 'blog';

mysql> EXIT;

www@4f1556522cd2: exit

```

## Migration and DB seeder

```
docker-compose exec php bash

php artisan migrate --seed
```

## Run app

http://localhost/

## Admin panel URL

http://localhost/admin

## For work queue

```
php artisan queue:work
```
