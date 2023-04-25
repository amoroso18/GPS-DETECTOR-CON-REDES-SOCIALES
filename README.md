<p align="center"><a href="https://github.com/amoroso18/rastreador-gps" target="_blank"><img src="https://github.com/amoroso18/rastreador-gps/blob/main/public/icons/spy.png" width="400" alt="Logo rastreador gps"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Rastreador GPS con PHP 8.1 & Laravel 10.8 

Rastreador GPS esta desarrollado en PHP 8.1 & Laravel 10.8 es un proyecto para navegadores web que facilita la gestión de rastreo ip y gps de los dispositivos detectados por los enlaces creados en el sistema. Es un proyecto que demuestra el uso de la mezcla de tecnologías actuales de codigo de programación, base de datos y uso de extesión de javascript, al igual que recursos libres como google maps, leaflet, sockets, entre otros.

PHP está enfocado principalmente a la programación de scripts del lado del servidor, por lo que se puede hacer cualquier cosa que pueda hacer otro programa CGI, como recopilar datos de formularios, generar páginas con contenidos dinámicos, o enviar y recibir cookies. Aunque PHP puede hacer mucho más.

Laravel es un marco de aplicación web con una sintaxis expresiva y elegante. Creemos que el desarrollo debe ser una experiencia placentera y creativa para ser realmente satisfactorio. Laravel elimina el dolor del desarrollo al facilitar tareas comunes utilizadas en muchos proyectos web, como:

## Incluye Base de datos MYSQL

MySQL permite almacenar y acceder a los datos a través de múltiples motores de almacenamiento, incluyendo InnoDB, CSV y NDB. MySQL también es capaz de replicar datos y particionar tablas para mejorar el rendimiento y la durabilidad.

## Utiliza extensiones de Leaflet & enlaces dinamicos de Google Maps

Leaflet es una biblioteca JavaScript de código abierto que se utiliza para crear aplicaciones de mapas web. Lanzado por primera vez en 2011, es compatible con la mayoría de las plataformas móviles y de escritorio, y admite HTML5 y CSS3. Entre sus usuarios se encuentran FourSquare, Pinterest y Flickr

La app de Google Maps te permite ir a cualquier lugar gracias a la navegación sencilla paso a paso. Maps te muestra instrucciones sobre cómo llegar y utiliza información del tráfico en tiempo real para encontrar la mejor ruta que te lleve a tu destino.

### Para su instalación es necesario tener conocimiento básico de:

- **[Laravel](https://laravel.com/)**
- **[PHP](https://www.php.net/manual/es/intro-whatis.php)**
- **[Composer](https://getcomposer.org/)**
- **[Comandos artisan](https://dev.to/leonmatiasm/los-comandos-php-artisan-mas-usados-por-mi-415p)**
- **[Mysql](https://www.mysql.com/)**
- **[LeaFlet](https://leafletjs.com/)**
- **[Google Maps](https://www.google.com/maps)**
- **[Públicar Rastreador GPS con PHP 8.1 & Laravel 10.8 en hosting](https://github.com/amoroso18/rastreador-gps)**
- **[Google Developer - Analitica de sitios web](https://developers.google.com/analytics?hl=es-419)**
- **[Facebook Developer - Analitica de facebook para negocios](https://developers.facebook.com/)**

## Publicar el sistema en hosting

Para publicar el proyecto primero debemos tener acceso a un hosting: 
- **[Presiona aquí para buscar hosting disponibles en google](https://www.google.com/search?q=hosting+en+peru)**

1) Al momento de adquirir un hosting ten en consideración el acceso a CPANEL, PHP 8.1, base de datos MYSQL y el dominio web que vas a adquirir, como ejemplo puedes adquirir uno similar a la red social que vas a utilizar como: (fcbook.watch, youtb.watch, midetectorgps.com entre muchas extensiones .com .pe .co .cl, etc ). Todo esto según la disponibilidad del dominio web.

2) Al tener acceso a nuestro hosting ingresamos nuestras credenciales en el cpanel, ejemplo: dominio.com/cpanel

3) Configuramos nuestros cpanel:

    3.1 creamos una base de datos en la opción de [Bases de datos MySQL®]

    3.2 creamos un usuario para adminsitrar la base de datos en la opción de [Usuarios MySQL] [Añadir nuevo usuario]
    
    3.3 Para terminar esta configuracion añadimos el usuario que creamos a la base de datos en [Añadir usuario a la base de datos], nos llevará a otra pantalla donde le brindaremos todos los permisos.

4) Descargamos el proyecto de Rastreador GPS con PHP 8.1 & Laravel 10.8
- **[Presiona aquí para dirigirnos al proyecto](https://github.com/amoroso18/rastreador-gps)**

    4.1 Presionamos en boton que dice CODE y presionamos en Download ZIP.

    4.2 Descomprimos el proyecto en nuestra computadora

    4.3 Nos dirigimos al archivo .env para cambiar la configuracion:

        APP_ENV=production

        APP_DEBUG=false

        APP_URL=https://midominioweb.com

        DB_DATABASE=EL_NOMBRE_DE_LA_BASE_DE_DATOS

        DB_USERNAME=EL_USUARIO_ADMINISTRADOR_DE_LA_BASE_DE_DATOS

        DB_PASSWORD=LA_CONTRASEÑA_DEL_USUARIO_ADMINISTRADOR_DE_LA_BASE_DE_DATOS

    4.4 Nos dirigimos a la carptea /public al archivo inde.php y cambiamos la configuracion:

            if (file_exists($maintenance = __DIR__.'/../laravel/storage/framework/maintenance.php')) {
                require $maintenance;
            }

            require __DIR__.'/../laravel/vendor/autoload.php';


            $app = require_once __DIR__.'/../laravel/bootstrap/app.php';

5) Ingresamos al hosting a la sección de BASE DE DATOS en la opción de PhpMyAdmin.

    5.5 Le damos click en el nombre de nuestra base de datos.

    5.6 Le damos click en la parte superior donde esta la opción de importar.

    5.7 Le damos click en el boton que dice Seleccionar archivo y seleccionamos el archivo gpsdetector.sql que esta en la carpeta principal de nuestro proyecto y presionamos en continuar, esperamos que cargue y listo, ya tenemos nuestra base de datos cargada al hosting.

6) Ingresamos al hosting a la sección de ARCHIVOS en la opción de ADMINISTRADOR DE ARCHIVOS y creamos una nueva carpeta con el nombre de laravel, en esa carpeta copiamos todo el contenido de nuestro proyecto con excepción de la carpeta public.

7) Ahora copiaremos todo el contenido de nuestra carpeta public en la carpeta de public_html del administrador de archivos.

8) Felicidades ya tienes tu sistema de detección ip y gps.



## ¿Cómo utilizar el proyecto?

Ingresamos a nuestro dominio con las credenciales de usuario ROOT@codeplayshop.com y contraseña 123456 y como primera vista veremos nuestro perfil en el sistema.

Tendrémos acceso a los modulos de:

    Sección de usuarios: 
        Creación de usuarios.
        Bandeja de usuarios con activación y suspeción de usuarios.

    Sección de rastro urls-ip: 
        Creación de url para rastreo ip o gps.
        Bandeja de urls de rastreo ip o gps.
        Creación de fondos de pantallas para urls (No diposnible en esta versión).
        Mapa de geolocalización de nuestras url (No diposnible en esta versión).

    Sección de envio de coordendas desde app:
        Modulo para crear enlaces para el Aplicativo ANDROID.
        Bandeja de coordenadas enviadas desde el Aplicativo ANDROID.
        Mapa de coordenadas.
        Descargar las coordenadas en excel.
        [Descarga Aplicativo para dispositivos ANDROID para envio de coordenadas](https://github.com/amoroso18/rastreador-gps/public/appAndroid/application-5ca98a54-d2e6-4397-b622-faf0e17dd723.apk)

        

        
   

## Seguridad y vulneraciones de privacidad

La seguridad del sistema dependerá del uso ético de la misma, recuerde cada contraseña esta encriptada. La vulneravilidad de la privacidad es autonoma de las personas que utilicen o presionen el enlace. Este sistema no optiene información privada de las personas, sino que se puede utilizar con la finalidad de gestionar recursos de una misma empresa u entre otros fines operativos y adminsitrativos con geolocalización.


## Licencia de Laravel

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Licencia de RASTREADOR con PHP 8.1 & Laravel 10.8

El proyecto RASTREADOR tiene licencia estandar de software de fuente abierta [MIT license](https://opensource.org/licenses/MIT).
