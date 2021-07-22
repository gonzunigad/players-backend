# Desafío Creditú

Este es un proyecto Laravel, parte del desafío de crear una SPA 
que busque jugadores. 

Este repositorio contiene el backend de la aplicación. 
Se creó una tabla 'players' con los datos enviados en formato CSV y se cargaron los datos manualmente en la base de datos. 

### Instalación

```
git clone git@github.com:gonzunigad/players-backend.git
cd players-backend
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

### Tests
Para correr los tests
```sh
php artisan test
```
