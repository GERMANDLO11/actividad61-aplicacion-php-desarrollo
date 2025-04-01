<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Alta moto</title>
</head>
<body>
<div>
    <header>
        <h1>ENDUROZONE</h1>
    </header>
    <main>

<?php
if(isset($_POST['inserta'])) {
    // Obtener y limpiar los datos
    $marca = $mysqli->real_escape_string($_POST['marca']);
    $modelo = $mysqli->real_escape_string($_POST['modelo']);
    $anio_fabricacion = $mysqli->real_escape_string($_POST['anio_fabricacion']);
    $cilindrada = $mysqli->real_escape_string($_POST['cilindrada']);
    $precio = $mysqli->real_escape_string($_POST['precio']);
    $stock = $mysqli->real_escape_string($_POST['stock']);

    // Comprobar si hay campos vacíos
    if(empty($marca) || empty($modelo) || empty($anio_fabricacion) || empty($cilindrada) || empty($precio) || empty($stock)) {
        if(empty($marca)) echo "<div>Campo marca vacío.</div>";
        if(empty($modelo)) echo "<div>Campo modelo vacío.</div>";
        if(empty($anio_fabricacion)) echo "<div>Campo anio de fabricación vacío.</div>";
        if(empty($cilindrada)) echo "<div>Campo cilindrada vacío.</div>";
        if(empty($precio)) echo "<div>Campo precio vacío.</div>";
        if(empty($stock)) echo "<div>Campo stock vacío.</div>";

        echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
    } else {
        // Insertar datos en la base de datos
        $result = $mysqli->query("INSERT INTO motos (marca, modelo, anio_fabricacion, cilindrada, precio, stock) VALUES ('$marca', '$modelo', '$anio_fabricacion', '$cilindrada', '$precio', '$stock')");

        // Cerrar conexión
        $mysqli->close();
        
        // Redirigir a la página principal
        header("Location:index.php");
        exit;
    }
}
?>

</main>
</div>
</body>
</html>
