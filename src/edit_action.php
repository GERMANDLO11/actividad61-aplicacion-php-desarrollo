<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación de Moto - ENDUROZONE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <header class="text-center mb-4">
        <h1>ENDUROZONE</h1>
    </header>
    <main>

<?php
// Verifica si se ha enviado el formulario para modificar la moto
if(isset($_POST['modifica'])) {
    // Obtiene los datos del formulario
    $idmotos = $mysqli->real_escape_string($_POST['motos_id']);
    $marca = $mysqli->real_escape_string($_POST['marca']);
    $modelo = $mysqli->real_escape_string($_POST['modelo']);
    $cilindrada = $mysqli->real_escape_string($_POST['cilindrada']);
    $anio_fabricacion = $mysqli->real_escape_string($_POST['anio_fabricacion']);
    $precio = $mysqli->real_escape_string($_POST['precio']);
    $stock = $mysqli->real_escape_string($_POST['stock']);

    // Validación de campos vacíos
    $errores = [];
    if(empty($marca)) $errores[] = "Campo marca vacío.";
    if(empty($modelo)) $errores[] = "Campo modelo vacío.";
    if(empty($anio_fabricacion)) $errores[] = "Campo año de fabricación vacío.";
    if(empty($cilindrada)) $errores[] = "Campo cilindrada vacío.";
    if(empty($precio)) $errores[] = "Campo precio vacío.";
    if(empty($stock)) $errores[] = "Campo stock vacío.";

    // Si hay errores, se muestran y no se realiza la actualización
    if(count($errores) > 0) {
        foreach($errores as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // Realiza la actualización del registro en la base de datos utilizando una consulta preparada
        if ($stmt = $mysqli->prepare("UPDATE motos SET marca = ?, modelo = ?, anio_fabricacion = ?, cilindrada = ?, precio = ?, stock = ? WHERE motos_id = ?")) {
            $stmt->bind_param("sssdiii", $marca, $modelo, $anio_fabricacion, $cilindrada, $precio, $stock, $idmotos);
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Registro editado correctamente.</div>";
                echo "<a href='index.php' class='btn btn-primary'>Volver al inicio</a>";
            } else {
                echo "<div class='alert alert-danger'>Error al editar el registro.</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Error en la consulta SQL.</div>";
        }
    }

    // Cierra la conexión de base de datos
    $mysqli->close();
}
?>

    </main>    
</div>
</body>
</html>


