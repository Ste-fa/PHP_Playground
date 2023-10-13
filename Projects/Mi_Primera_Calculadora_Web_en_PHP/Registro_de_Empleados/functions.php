<?php

// functions.php

// Configuración de la base de datos
$servername = "localhost";
$username = "sfandinho";
$password = "123456";
$dbname = "myEmployeeDB";

// Crear conexión
$conection = mysqli_connect($servername, $username, $password);

// Verificar conexión
if (!$conection) {
    die("Conexión fallida: <br>" . mysqli_connect_error());
}

// Seleccionar base de datos
mysqli_select_db($conection, "myEmployeeDB");

// Crear tabla de empleados si no existe
$sql = "CREATE TABLE IF NOT EXISTS employee (
    id int (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (30) NOT NULL,
    apellido VARCHAR (30) NOT NULL,
    email VARCHAR (50) NOT NULL, 
    telefono int (9) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Ejecutar consulta para crear tabla
if (mysqli_query($conection, $sql)) {
    // echo "Tabla empleados creada <br>";
} else {
    // echo "Error de creación tabla: <br>" . mysqli_error($conection);
}

// Variables para entrada de formularios
$nombre = $apellido = $email = $telefono = "";
$nombreErr = $apellidoErr = $emailErr = $telefonoErr = "";

// Imprimir datos del formulario (descomentar para depuración)
// print_r($_POST);

// Validar envío de formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = test_input($_POST["nombre"]);
    $apellido = test_input($_POST["apellido"]);
    $email = test_input($_POST["email"]);
    $telefono = test_input($_POST["telefono"]);

    // Validar campos
    if (empty($nombre)) {
        $nombreErr = "Nombre obligatorio";
    }

    if (empty($apellido)) {
        $apellidoErr = "Apellido obligatorio";
    }

    if (empty($email)) {
        $emailErr = "E-mail obligatorio";
    }

    if (empty($telefono)) {
        $telefonoErr = "Teléfono obligatorio";
    }

    // Si no hay errores, llamamos a addEmployee
    if (empty($nombreErr) && empty($apellidoErr) && empty($emailErr) && empty($telefonoErr)) {
        // Agregar empleado
        addEmployee($nombre, $apellido, $email, $telefono);
    }
}

// Función para limpiar datos del formulario
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// CRUD

// Función para agregar empleado
function addEmployee($nombre, $apellido, $email, $telefono)
{
    global $conection;
    $sql = "INSERT INTO employee (nombre, apellido, email, telefono) VALUES ('$nombre', '$apellido', '$email', '$telefono')";

    if (mysqli_query($conection, $sql)) {
        return true; // Empleado agregado correctamente
    } else {
        return false; // Error al agregar el empleado
    }
}

// Función para obtener todos los empleados


function getEmployee()
{
    global $conection;
    $sql = "SELECT * FROM employee";
    $result = $conection->query($sql);

    $employees = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
    }
    return $employees;
}

// Función para obtener un empleado por ID
function getEmployeeById($id)
{
    global $conection;
    $sql = "SELECT * FROM employee WHERE id = $id";
    $result = $conection->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Función para editar empleado
function editEmployee($id, $nombre, $apellido, $email, $telefono)
{
    global $conection;
    $sql = "UPDATE employee SET nombre='$nombre', apellido='$apellido', email='$email', telefono='$telefono' WHERE id=$id";
    return $conection->query($sql);
}



// Función para eliminar un empleado por ID

function deleteEmployee($id) {
    global $conection;
    
    // Verificar que el ID es un número entero
    $id = intval($id);

    // Construir y ejecutar la consulta DELETE
    $sql = "DELETE FROM employee WHERE id = $id";
    
    if (mysqli_query($conection, $sql)) {
        echo "Empleado eliminado correctamente";
    } else {
        echo "Error al eliminar el empleado: " . mysqli_error($conection);
    }
}

?>