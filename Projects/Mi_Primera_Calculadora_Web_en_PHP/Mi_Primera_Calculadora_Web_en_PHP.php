<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Primera calculadora web en PHP</title>
</head>
<body>
    <h2>Mi Primera calculadora web en PHP</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Numero 1</label>
        <input type="number" name="num1" required><br><br>
        <label>Numero 2</label>
        <input type="number" name="num2" required><br><br>
        <label> Operación: </label>
        <select name="operacion">
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Calcular">
    </form>

    <?php
    // Verifica si el formulario ha sido enviado
    if (isset($_POST["submit"])) {
        // Obtiene los valores ingresados en el formulario
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operacion = $_POST['operacion'];

        // Realiza la operación seleccionada
        switch ($operacion) {
            case 'sumar':
                $resultado = $num1 + $num2;
                break;

            case 'restar':
                $resultado = $num1 - $num2;
                break;

            case 'multiplicar':
                $resultado = $num1 * $num2;
                break;

            case 'dividir':
                // Verifica si el divisor es cero para evitar la división por cero
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                } else {
                    $resultado = "indeterminado (división por cero)";
                }
                break;

            default:
                $resultado = "sin resultado";
                break;
        }

        // Muestra el resultado de la operación
        echo "El resultado de la operacion: " . $operacion . " es igual a " . $resultado;
    }
    ?>

</body>
</html>
