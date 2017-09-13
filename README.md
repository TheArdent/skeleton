# Laravel Skeleton
Laravel 5.4 + Docker + PHP 7.1 + Modules (Nwidart/Modules). Hosted on caddy-server (default ssl letsencrypt) 

## Install

```
git clone git@github.com:aios/laravel-skeleton.git
docker-compose up
```
then add to your hosts file

`
127.0.0.1 demo.app
`
## Modules
On start you have module Users - look for it - it has laravel base structure. 
Your struct can controlled by config/modules.php

You can generate your own modules by 
```
docker exec -ti laravel_app /bin/bash
php artisan module:make Posts
```
It generates new struct for module Posts in modules
Folder modules has Modules namespace - you can check it in composer.json

## Namespaces on views,langs,configs
Example is Users module
You can use it views in blade directive @include
```
@include("users::some_view_name")
```
If you want to use Users langs - you should use
```
trans("users::some_lang_name")
```
If you want to use Users configs - you should use
```
config('users.some_users_config')
```

## Stubs
You have control on new generating files for new modules
it placed on /resources/stubs

## 4 use in production
Look at docker/caddy/Caddyfile
rename demo.app to your own host/domain registered for server

If you want to use ssl (Let's Encrypt) rename http to https in that file 

Look for #Install Step, command docker-compose up, and go to http(s)://yourdomain.com

## Start hacking
