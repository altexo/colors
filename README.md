
# colors

## Introduccion

Url produccion:
```bash
http://165.232.158.79
```

Esta app esta desarrollada con un stack de:

Laravel
MySQL
Vue SPA

La aplicacioon web se encuentra dentro del mismo proyecto, solo necesitas seguir las instrucciones para correr el proeycto. No olvides crear una base de datos y añadir los datos de conexion en el archivo .env

Podran encontrar un archivo API-doc.json con mas ejemplos del API. Tambien pueden encontrarse las rutas en routes/api.php

## Installation
First run
```bash
composer install
```

Edit .env and set your database connection details
(When installed via git clone or download, run 
```bash
php artisan key:generate
``` 
and 
```bash
php artisan jwt:secret
```
```bash 
php artisan migrate
```
```bash
npm install
```
# Usage

Development
```bash
# run laravel
php artisan serve

# build and watch
npm run watch

# serve with hot reloading
npm run hot
```
Production
```bash
npm run production
```

