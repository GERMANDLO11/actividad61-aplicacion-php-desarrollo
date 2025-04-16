<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja Moto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <header class="mb-4">
        <h1 class="text-center text-primary">ENDUROZONE</h1>
    </header>
    <main>

<?php
// Verifica si el parámetro 'motos_id' está presente en la URL
if(isset($_GET['motos_id'])) {
    // Recoge el id de la moto a eliminar a través de la clave motos_id del array asociativo $_GET y lo almacena en la variable $idmotos
    $idmotos = $_GET['motos_id'];

    // Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
    $idmotos = $mysqli->real_escape_string($idmotos);

    // Se realiza el borrado del registro: delete.
    $result = $mysqli->query("DELETE FROM motos WHERE motos_id = $idmotos");

    if ($result) {
        echo "<div class='alert alert-success'>Registro borrado correctamente...</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al borrar el registro.</div>";
    }

    // Se cierra la conexión de base de datos previamente abierta
    $mysqli->close();

    echo "<a href='index.php' class='btn btn-primary mt-3'>Ver resultado</a>";
} else {
    echo "<div class='alert alert-warning'>Error: No se ha proporcionado un id de moto válido.</div>";
}
?>

    </main>
</div>
</body>
</html>



