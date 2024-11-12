Proyecto que reserva una sala de un cowork, el proyecto esta hecho con laravel 11, MySQL y bootstrap 5
se crearon controladores con logica de negocio para Room y Reservation, relacion entre ambos modelos para simplificar querys anidadas con el orm, validacion en los controladores segun el tipo de dato y de role; ademas se creo un middleware para verificar si un usario es admin o no y a las url que tendra acceso o no segun el tipo de role del user

para correr el proyecto en local se necesita una bd en el .env que sea utf8_general_ci 
ejecutar los siguientes comandos paso a paso

link de la app deployada en railway: https://coworking-production.up.railway.app/
user-client= patriciocabreravera@gmail.com
password= 12345678

user-admin = admin@twgroup.cl
password= 12345678

(se crearon 3 sakas de prueba en el seeder y 2 usuarios de prueba cada uno con un rol especifico)

```php
composer install

npm i && npm run dev

php artisan migrate:fresh --seed

php artisan serve

