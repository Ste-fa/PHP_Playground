<!-- employee_list.php -->

<?php
// Incluir el archivo de funciones
include 'functions.php';

// Obtener y mostrar la lista de empleados
$employee = getEmployee();

// Verificar si hay empleados registrados
if (!empty($employee)) {
    echo "<ul>";
    foreach ($employee as $employee) {
        // Mostrar información del empleado y enlaces de acción
        echo "<li>{$employee['nombre']} {$employee['apellido']} - {$employee['email']} {$employee['telefono']} - ";
        echo "[<a href='edit_employee.php?id={$employee['id']}'>Editar</a>] ";
        echo "[<a href='delete_employee.php?id={$employee['id']}'>Eliminar</a>]</li>";
    }
    echo "</ul>";
} else {
    // Mostrar mensaje si no hay empleados registrados
    echo "<p>No hay empleados registrados.</p>";
}
?>