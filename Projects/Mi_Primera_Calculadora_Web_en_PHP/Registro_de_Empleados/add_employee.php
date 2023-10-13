<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar empleado</title>
</head>
<body>

<h1>Agregar nuevo empleado</h1>
<ol style="color: #333;">

    <!-- Formulario de edición -->
    <form action="functions.php?action=edit" method="post">

        <!-- Campo: Nombre -->
        <label for="nombre" style="margin-right: 5px;"> Nombre: </label>
        <input type="text" name="nombre" style="width: 200px; margin-bottom: 5px;" required> <br>

        <!-- Campo: Apellido -->
        <label for="apellido"> Apellido: </label>
        <input type="text" name="apellido" style="width: 200px; margin-bottom: 5px;" required> <br>

        <!-- Campo: Email -->
        <label for="email" style="margin-right: 23px;"> Email: </label>
        <input type="text" name="email" style="width: 200px; margin-bottom: 5px;" required> <br>

        <!-- Campo: Teléfono -->
        <label for="telefono"> Teléfono: </label>
        <input type="text" name="telefono" style="width: 200px; margin-bottom: 5px;" required> <br>

        <!-- Botón de envío -->
        <input type="Submit" value="Guardar cambios">
    </form>



        <p style="color: #0066cc;"><a href="index.php">Volver al menu Empleados</a></p>

</ol>
</body>
</html>