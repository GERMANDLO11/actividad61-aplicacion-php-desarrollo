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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <header class="text-center mb-4">
        <h1>ENDUROZONE</h1>
    </header>
    <main>
        <h2>Registrar Nueva Moto</h2>

        <form method="POST" action="" class="mt-4">
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
            <div class="mb-3">
                <label for="anio_fabricacion" class="form-label">Año de Fabricación</label>
                <input type="number" class="form-control" id="anio_fabricacion" name="anio_fabricacion" required>
            </div>
            <div class="mb-3">
                <label for="cilindrada" class="form-label">Cilindrada</label>
                <input type="number" class="form-control" id="cilindrada" name="cilindrada" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            
            <button type="submit" name="inserta" class="btn btn-primary">Registrar Moto</button>
        </form>

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
        echo "<div class='alert alert-danger'>Por favor, complete todos los campos.</div>";
    } else {
        // Insertar datos en la base de datos
        $result = $mysqli->query("INSERT INTO motos (marca, modelo, anio_fabricacion, cilindrada, precio, stock) VALUES ('$marca', '$modelo', '$anio_fabricacion', '$cilindrada', '$precio', '$stock')");

        // Cerrar conexión
        $mysqli->close();
        
        // Redirigir a la página principal
        echo "<div class='alert alert-success'>Moto registrada correctamente. <a href='index.php'>Ir al inicio</a></div>";
        exit;
    }
}
?>

    </main>
</div>
</body>
</html>

