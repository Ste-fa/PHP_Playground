<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar empleado</title>
</head>
<body>

<!-- Encabezado -->
<h1>Eliminar empleado</h1>

<!-- Formulario de búsqueda -->
<form action="delete_employee.php" method="get">
    <label for="id">Ingrese el ID de empleado: </label>
    <input type="text" name="id" required>
    <input type="submit" value="Buscar">
</form>


<?php
// delete_employee.php

include("functions.php");

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $employeeId = $_GET['id'];
    $employee = getEmployeeById($employeeId);

    // Verificar si el empleado existe
    if ($employee) {
        // Mostrar el formulario para confirmar la eliminación
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Eliminar empleado</title>
        </head>
        <body>

        <!-- Encabezado -->
        <h2>Eliminar Empleado</h2>

        <!-- Mostrar información del empleado y formulario de confirmación -->
        <p>ID: <?php echo $employee['id']; ?></p>
        <p>Nombre: <?php echo $employee['nombre']; ?></p>
        <p>Apellido: <?php echo $employee['apellido']; ?></p>
        <p>Email: <?php echo $employee['email']; ?></p>
        <p>Teléfono: <?php echo $employee['telefono']; ?></p>

        <form action="delete_employee.php" method="post">
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <p>¿Estás seguro que deseas eliminar a este empleado?</p>
            <input type="submit" value="Eliminar">
        </form>

        <p><a href="index.php">Cancelar</a></p>

        </body>
        </html>
        <?php
    } else {
        echo "<p>Empleado no encontrado.</p>";
        echo "<p><a href='index.php'>Volver a la Lista de Empleados</a></p>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Proceso de eliminación después de la confirmación
    $employeeIdToDelete = $_POST["id"];
    deleteEmployee($employeeIdToDelete);
    // Redirigir a la página principal después de la eliminación
    header("Location: index.php");
    exit();
} 
?>

<!-- Enlace para volver a la lista de empleados -->
<p style="color: #0066cc;"><a href="index.php">Volver al menu Empleados</a></p>

</body>
</html>