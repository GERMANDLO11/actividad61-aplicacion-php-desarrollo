<?php
/*Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario de la BD
*/
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>ENDUROZONE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
	<header class="text-center mb-4">
		<h1 class="display-4">ZONAPADOCK</h1>
	</header>

	<main>
	<ul class="nav justify-content-center mb-4 bg-light p-3 rounded shadow">
  <li class="nav-item">
    <a class="nav-link active text-primary fw-bold" href="index.php">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-dark" href="add.html">Alta</a>
  </li>
</ul>


		<h2 class="text-center mb-4">MOTOS</h2>
		<table class="table table-bordered table-striped">
			<thead class="thead-dark">
				<tr>
					<th>MARCA</th>
					<th>MODELO</th>
					<th>CILINDRADA</th>
					<th>AÑO DE FABRICACIÓN</th>
					<th>PRECIO</th>
					<th>STOCK</th>
					<th>ACCIONES</th>
				</tr>
			</thead>
			<tbody>

<?php
/* Se realiza una consulta de selección de la tabla motos ordenados por modelo y marca */
$query = "SELECT motos_id, marca, modelo,cilindrada, anio_fabricacion, precio, stock FROM motos ORDER BY modelo, marca";
$resultado = $mysqli->query($query);

// Comprobamos si la consulta fue exitosa
if ($resultado === false) {
    echo "<div class='alert alert-danger'>Error en la consulta de la base de datos.</div>";
} else {
    // Comprobamos si se encontraron registros
    if ($resultado->num_rows > 0) {
        // Recorremos cada fila de la consulta
        while($fila = $resultado->fetch_assoc()) {
            echo "<tr>\n";
            echo "<td>" . htmlspecialchars($fila['marca']) . "</td>\n";
            echo "<td>" . htmlspecialchars($fila['modelo']) . "</td>\n";
			echo "<td>" . htmlspecialchars($fila['cilindrada']) . "</td>\n";
            echo "<td>" . htmlspecialchars($fila['anio_fabricacion']) . "</td>\n";
            echo "<td>" . htmlspecialchars($fila['precio']) . "</td>\n";
            echo "<td>" . htmlspecialchars($fila['stock']) . "</td>\n";
            echo "<td>";
            echo "<a href=\"edit.php?motos_id=" . urlencode($fila['motos_id']) . "\" class=\"btn btn-warning btn-sm\">Edición</a>\n";
            echo "<a href=\"delete.php?motos_id=" . urlencode($fila['motos_id']) . "\" class=\"btn btn-danger btn-sm\" onClick=\"return confirm('¿Está segur@ que desea eliminar la moto?')\">Baja</a></td>\n";
            echo "</tr>\n";
        }
    } else {
        echo "<tr><td colspan='6' class='text-center'>No se encontraron motos.</td></tr>";
    }
}

// Cierra la conexión de la BD
$mysqli->close();
?>
			</tbody>
		</table>
	</main>

	<footer class="text-center mt-5">
    	<p>Created by the IES Miguel Herrero team &copy; 2025</p>
  	</footer>
</div>
</body>
</html>
