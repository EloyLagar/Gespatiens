# <span style="color: #0000FF;">ges</span><span style="color: #008000;">patiens</span>

## Descripción

**Gespatiens** es una aplicación web diseñada para la gestión de una comunidad terapéutica. Su propósito es agilizar y optimizar los procesos de generación de documentación necesaria para los pacientes residentes, las actividades que realizan y las atenciones que reciben de los profesionales. La aplicación permite a la administración crear fichas de pacientes y perfiles de empleados de manera eficiente. Además, proporciona a los profesionales una vía de comunicación con otros trabajadores, junto con herramientas para evaluar a los pacientes y las actividades que organizan.

## Instalación

1. Clona el repositorio.
2. Instala las dependencias con `composer install`.
3. Crea el enlace simbólico con `php artisan storage:link`.
4. Configura el archivo `.env` (es necesario proporcionar datos para el envío de correos y el enlace a la página de trapmail).
5. Ejecuta las migraciones y los seeders con `php artisan migrate --seed`.

> [!CAUTION] 
> Es posible que ocurra un error al generar los usuarios con el seeder debido a una funcionalidad de la aplicación. Se recomienda comentar parte de los tipos de usuarios en el array e ir ejecutando el seeder de forma incremental.

## Uso

1. Se recomienda acceder por primera vez como administrador.
2. La página inicial permite crear avisos visibles para otros empleados registrados.
3. En la barra de navegación lateral, se puede acceder a las secciones de empleados, residentes, antiguos residentes, actividades, reportes, diario y evaluaciones.
4. Las páginas de indexado permiten crear nuevos elementos, ver detalles, editar y eliminar en algunos casos.
5. Para consultar el diario, introduce una fecha específica.
6. Para las evaluaciones, selecciona un mes y un tipo de materia.

> [!TIP] 
> Puedes modificar tus datos y el idioma de la aplicación en la página de perfil.

> [!NOTE] 
> Al generar un perfil de empleado, llegará un correo a la cuenta de prueba de correos configurada. Desde allí, el empleado podrá crear sus credenciales de acceso (contraseña).

> [!WARNING]
> Si ya tienes una sesión iniciada como empleado, es posible que debas usar una ventana de incógnito para acceder a la creación de credenciales desde el correo.

## Licencia

Este proyecto está licenciado bajo la licencia MIT. Para más detalles, consulta el archivo [LICENSE](LICENSE).

## Autor

**Eloy Lagar Jaime**

Agradecimientos a Manuel Lagar Naharro por la idea.

## Recursos adicionales

- [Laravel](https://laravel.com)
- [PHP](https://www.php.net)
- [AdminLTE](https://adminlte.io)
