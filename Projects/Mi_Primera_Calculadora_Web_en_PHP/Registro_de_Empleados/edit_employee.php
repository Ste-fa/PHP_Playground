<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar empleado</title>
</head>
<body>

<!-- Encabezado -->
<h1>Editar empleado</h1>

<!-- Formulario de búsqueda -->
<form action="edit_employee.php" method="get">
    <label for="id">Ingrese el ID de empleado: </label>
    <input type="text" name="id" required>
    <input type="submit" value="Buscar">
</form>

<?php
// Incluir el archivo de funciones
include 'functions.php';

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $employeeId = $_GET['id'];
    $employee = getEmployeeById($employeeId);

    // Verificar si el empleado existe
    if ($employee) {
        // Mostrar el formulario para editar el empleado
        ?>
        <form action="edit_employee.php" method="post">
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $employee['nombre']; ?>" required><br>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" value="<?php echo $employee['apellido']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $employee['email']; ?>" required><br>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="<?php echo $employee['telefono']; ?>" required><br>

            <input type="submit" value="Guardar cambios">
        </form>
        <?php
    } else {
        echo "<p>Empleado no encontrado.</p>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Mostrar el mensaje de edición solo después de enviar el formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    // Validar campos (puedes agregar más validaciones según tus necesidades)
    if (empty($nombre) || empty($apellido) || empty($email) || empty($telefono)) {
        $errorMessage = "Todos los campos son obligatorios.";
    } else {
        // Procesar la edición del empleado
        if (editEmployee($id, $nombre, $apellido, $email, $telefono)) {
            echo "Empleado editado correctamente.";
        } else {
            $errorMessage = "Error al editar el empleado.";
        }
    }
}
?>

<!-- Enlace para volver a la lista de empleados -->
<p style="color: #0066cc;"><a href="index.php">Volver al menu Empleados</a></p>

</body>
</html>