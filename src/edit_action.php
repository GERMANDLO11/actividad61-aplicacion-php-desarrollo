<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>ENDUROZONE</title>
</head>
<body>
<div>
    <header>
        <h1>ENDUROZONE</h1>
    </header>
    <main>                

<?php
/* Se comprueba si se ha llegado a esta página PHP a través del formulario de edición. 
Para ello se comprueba la variable de formulario: "modifica" enviada al pulsar el botón Guardar de dicho formulario.
Los datos del formulario se acceden por el método: POST
*/

if(isset($_POST['modifica'])) {
    /* Se obtienen los datos de la moto (idmotos, marca, modelo, anio_fabricacion y cilindrada) a partir del formulario de edición (motosid, marca, modelo, anio_fabricacion y cilindrada) por el método POST.
    Se envía a través del cuerpo del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET */
    
    $idmotos = $mysqli->real_escape_string($_POST['motos_id']);
    // echo $idmotos."<br>";
    $marca = $mysqli->real_escape_string($_POST['marca']);
    // echo $marca."<br>";
    $modelo = $mysqli->real_escape_string($_POST['modelo']);
    // echo $modelo."<br>";
    $anio_fabricacion = $mysqli->real_escape_string($_POST['anio_fabricacion']);
    // echo $anio_fabricacion."<br>";
    $cilindrada = $mysqli->real_escape_string($_POST['cilindrada']);
    // echo $cilindrada."<br>";
    $precio = $mysqli->real_escape_string($_POST['precio']);
    // echo $precio."<br>";
    $stock = $mysqli->real_escape_string($_POST['stock']);
    // echo $stock."<br>";

    /* Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
    Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL. 
    Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.
    Ejemplo: Entrada sin escapar: "O'Reilly" contiene una comilla simple (').
    Escapado con mysqli_real_escape_string(): Se convierte en "O\'Reilly", evitando que la comilla se interprete como el fin de una cadena en SQL. */

    // Se comprueba si existen campos del formulario vacíos
    if(empty($marca) || empty($modelo) || empty($anio_fabricacion) || empty($cilindrada)) {
        if(empty($marca)) {
            echo "<font color='red'>Campo marca vacío.</font><br/>";
        }

        if(empty($modelo)) {
            echo "<font color='red'>Campo modelo vacío.</font><br/>";
        }

        if(empty($anio_fabricacion)) {
            echo "<font color='red'>Campo anio de fabricación vacío.</font><br/>";
        }

        if(empty($cilindrada)) {
            echo "<font color='red'>Campo cilindrada vacío.</font><br/>";
        }
        
        if(empty($precio)) {
            echo "<font color='red'>Campo precio vacío.</font><br/>";
        }
        
        if(empty($stock)) {
            echo "<font color='red'>Campo stock vacío.</font><br/>";
        }
    } else { // Se realiza la modificación de un registro de la BD. 
        // Se actualiza el registro a modificar: update
        $mysqli->query("UPDATE motos SET marca = '$marca', modelo = '$modelo', anio_fabricacion = '$anio_fabricacion', cilindrada = '$cilindrada',precio='$precio',stock='$stock' WHERE motos_id = $idmotos");
        $mysqli->close();
        echo "<div>Registro editado correctamente...</div>";
        echo "<a href='index.php'>Ver resultado</a>";
        // Se redirige a la página principal: index.php
        //header("Location: index.php");
    } // fin else
} // fin if
?>

    <!-- <div>Registro editado correctamente</div> -->
    <!-- <a href='index.php'>Ver resultado</a> -->
    </main>    
</div>
</body>
</html>


