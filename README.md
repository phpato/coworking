# Proyecto de Reserva de Salas para Coworking

Este proyecto permite la reserva de salas en un espacio de coworking. Ha sido desarrollado utilizando **Laravel 11**, **MySQL** y **Bootstrap 5**. A continuación, se detallan las características y los pasos necesarios para ejecutar el proyecto en tu entorno local.

## Características del Proyecto

- **Modelo de Datos**: Se han creado controladores que implementan la lógica de negocio para los modelos `Room` y `Reservation`. Esto permite establecer una relación entre ambos modelos, simplificando las consultas mediante el uso del ORM de Laravel.
  
- **Validaciones**: Se han implementado validaciones en los controladores según el tipo de dato y el rol del usuario, asegurando que la información procesada sea correcta y se ajusten a las reglas del negocio.

- **Middleware de Autenticación**: Se ha desarrollado un middleware para verificar si un usuario tiene rol de administrador. Esto restringe el acceso a ciertas rutas del sistema dependiendo del rol del usuario.

## Despliegue

La aplicación está desplegada en Railway. Puedes acceder mediante el siguiente enlace:

[Acceder a la app desplegada](https://coworking-production.up.railway.app/)

### Credenciales de Prueba

- **Usuario Cliente**:  
  - Email: `patriciocabreravera@gmail.com`  
  - Contraseña: `12345678`

- **Usuario Administrador**:  
  - Email: `admin@twgroup.cl`  
  - Contraseña: `12345678`

### Datos de Prueba

Se han creado 3 salas de prueba en la base de datos mediante el seeder, junto con 2 usuarios de prueba, cada uno con un rol específico.

## Requisitos para Ejecución Local

Para correr el proyecto en tu entorno local, asegúrate de contar con:

- PHP >= 8.0
- Composer
- Node.js y npm
- MySQL (configurar la base de datos a `utf8_general_ci` en el archivo `.env`)

### Pasos para Ejecutar el Proyecto

1. Clona el repositorio:

   ```bash
   git clone <URL_DEL_REPOSITORIO>
   cd <NOMBRE_DEL_PROYECTO>
   ```

2. Instala las dependencias de PHP:

   ```bash
   composer install
   ```

3. Instala las dependencias de JavaScript y compílalas:

   ```bash
   npm install && npm run dev
   ```

4. Crea y migra la base de datos (esto también ejecuta el seeder):

   ```bash
   php artisan migrate:fresh --seed
   ```

5. Inicia el servidor local:

   ```bash
   php artisan serve
   ```

Tu aplicación ahora debería estar funcionando en `http://localhost:8000`.

### Notas Adicionales

- Asegúrate de que tu archivo `.env` esté correctamente configurado con las credenciales de la base de datos.
- Puedes acceder a la documentación de Laravel para más información sobre cómo extender y personalizar la aplicación según tus necesidades.

¡Listo! Ahora puedes disfrutar de tu propio sistema de reservas para el coworking.
