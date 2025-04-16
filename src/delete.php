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
    <div class="container py-5">
        <header class="mb-4">
            <h1 class="text-center text-primary fw-bold">ENDUROZONE</h1>
        </header>

        <main class="bg-white p-4 rounded shadow">
<?php
// Verifica si el parámetro 'motos_id' está presente en la URL
if(isset($_GET['motos_id'])) {
    $idmotos = $_GET['motos_id'];
    $idmotos = $mysqli->real_escape_string($idmotos);

    $result = $mysqli->query("DELETE FROM motos WHERE motos_id = $idmotos");

    if ($result) {
        echo "<div class='alert alert-success'>Registro borrado correctamente...</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al borrar el registro.</div>";
    }

    $mysqli->close();

    echo "<a href='index.php' class='btn btn-primary mt-3'>Ver resultado</a>";
} else {
    echo "<div class='alert alert-warning'>Error: No se ha proporcionado un ID de moto válido.</div>";
}
?>
        </main>
    </div>

    <!-- Bootstrap JS (opcional, solo si necesitas funciones como modales o dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



