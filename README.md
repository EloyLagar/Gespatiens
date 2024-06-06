# # <span style="color: #33fdd4;">ges</span><span style="color: #fff;">patiens</span>

## Descripción

Aplicación web destinada a la gestión de una comunidad terapéutica. El propósito del proyecto es agilizar y optimizar los procesos por los que se genera documentación necesaria de


## Descripción

Aplicación web destinada a la gestión de una comunidad terapéutica. El propósito del proyecto es agilizar y optimizar los procesos por los que se genera documentación necesaria de todos los pacientes residentes, de las actividades que estos realizan, así como de las atenciones que los profesionales les brindan. La aplicación facilita a la administración generar las fichas de los pacientes y perfiles a los empleados respectivamente. Otorga a los profesionales, además, una vía de comunicación con los otros trabajadores, además de herramientas para evaluar a los pacientes y a las actividades que organizan.

## Instalación

1. Clonar el repositorio.
2. Cargar las dependencias con `composer install`.
3. Hacer link con el comando `php artisan storage:link`.
4. Configurar el archivo `.env` (será necesario proporcionar datos para el envío de correos y el enlace a la página de trapmail).
5. Lanzar las migraciones y los seeders con `php artisan migrate --seed`.

> [!CAUTION] 
> Es posible que ocurra un error al generar los usuarios con el seeder debido a una funcionalidad de la aplicación. Por ello, se  recomienda comentar parte de los tipos de usuarios del array e ir haciendo el seeder poco a poco.

## Uso

1. Se recomienda acceder la primera vez como administrador.
2. La página inicial permite crear avisos que podrán leer otros empleados registrados.
3. En la barra de navegación lateral se puede acceder a los apartados de indexado de empleados, residentes, antiguos residentes, actividades, y reportes, además del diario y de las evaluaciones.
4. Las páginas de indexado permiten ir al creador de elementos, así como ver en detalle, editarlos y borrarlos en algunos casos.
5. Para el diario, introduzca una fecha para ver esa página del diario.
6. Para las evaluaciones, seleccione un mes y un tipo de materia.

> [!TIP] 
Puedes modificar tus datos y el idioma de la aplicación en la página de perfil.

>  [!NOTE] 
> Al generar un perfil de empleado, llegará un correo a la cuenta de la herramienta que uses para probar correos. Desde allí podrá acceder como el empleado para crear sus credenciales de acceso (contraseñas).

> [!WARNING]
>  Es posible que si ya tienes una sesión con un empleado, debas usar una pestaña en modo incógnito para acceder desde el correo a la creación de credenciales.

## Licencia

Este proyecto está licenciado bajo la licencia MIT. Para más detalles, consulta el archivo [LICENSE](LICENSE).

## Autor

Eloy Lagar Jaime

Agradecimientos a Manuel Lagar Naharro por la idea.

## Recursos adicionales

- [Laravel](https://laravel.com)
- [PHP](https://www.php.net)
- [AdminLTE](https://adminlte.io)
