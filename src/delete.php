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
</head>
<body>
<div>
    <header>
        <h1>ENDUROZONE</h1>
    </header>
    <main>

<?php
/* Obtiene el id del registro de la moto a eliminar, motos_id, a partir de su URL. Se recibe el dato utilizando el método: GET 
Recuerda que existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request)
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato de la moto se obtiene a través de la clave: $_GET['motos_id']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

// Verifica si el parámetro 'motos_id' está presente en la URL
if(isset($_GET['motos_id'])) {
    // Recoge el id de la moto a eliminar a través de la clave motos_id del array asociativo $_GET y lo almacena en la variable $idmotos
    $idmotos = $_GET['motos_id'];

    // Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
    $idmotos = $mysqli->real_escape_string($idmotos);

    // Se realiza el borrado del registro: delete.
    $result = $mysqli->query("DELETE FROM motos WHERE motos_id = $idmotos");

    if ($result) {
        echo "<div>Registro borrado correctamente...</div>";
    } else {
        echo "<div>Error al borrar el registro.</div>";
    }

    // Se cierra la conexión de base de datos previamente abierta
    $mysqli->close();

    echo "<a href='index.php'>Ver resultado</a>";
} else {
    echo "<div>Error: No se ha proporcionado un id de moto válido.</div>";
}
?>

    </main>
</div>
</body>
</html>


