# README - Sistema de Gestión de Empleados

Este repositorio contiene un sistema simple de gestión de empleados desarrollado en PHP y MySQL. El sistema proporciona las siguientes funcionalidades:

1. **Agregar Empleado:** Permite registrar nuevos empleados en la base de datos.

2. **Editar Empleado:** Permite actualizar la información de un empleado existente.

3. **Eliminar Empleado:** Permite eliminar un empleado de la base de datos.

4. **Listar Empleados:** Muestra una lista de todos los empleados registrados.

## Estructura de Archivos

El proyecto se organiza en varios archivos para facilitar la comprensión y mantenimiento del código:

1. **add_employee.php:** Contiene el formulario para agregar un nuevo empleado.

2. **edit_employee.php:** Proporciona la interfaz para editar la información de un empleado.

3. **delete_employee.php:** Permite buscar y eliminar un empleado.

4. **employee_list.php:** Muestra una lista de todos los empleados registrados.

5. **functions.php:** Contiene las funciones PHP necesarias para interactuar con la base de datos, realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar), y validar formularios.

6. **styles.css:** Hoja de estilos básica para mejorar el aspecto visual del sistema.

## Configuración de la Base de Datos

- La configuración de la base de datos se encuentra en el archivo **functions.php**.
- Se utiliza MySQL para la base de datos, asegúrese de tener un servidor MySQL en ejecución.

```php (para cambiar los datos de la BD):
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_de_tu_base_de_datos";
