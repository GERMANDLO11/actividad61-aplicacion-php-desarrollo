<?php
// Incluye fichero con parámetros de conexión a la base de datos
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
    <ul>
        <li><a href="index.php" >Inicio</a></li>
        <li><a href="add.html" >Alta</a></li>
    </ul>
    <h2>Modificación moto</h2>

<?php
/* Obtiene el id del registro de la moto a modificar, motos_id, a partir de su URL. Este tipo de datos se accede utilizando el método: GET */

// Recoge el id de la moto a modificar a través de la clave motos_id del array asociativo $_GET y lo almacena en la variable motos_id
 $idmotos = $_GET['motos_id'];
// echo $motos_id;

// Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$idmotos = $mysqli->real_escape_string($idmotos);

// Se selecciona el registro a modificar: select
$resultado = $mysqli->query("SELECT marca, modelo, cilindrada, anio_fabricacion, precio, stock FROM motos WHERE motos_id = $idmotos");

// Se extrae el registro y lo guarda en el array $fila
$fila = $resultado->fetch_array();
$marca = $fila['marca'];
// echo $marca;
$modelo = $fila['modelo'];
// echo $modelo;
$cilindrada = $fila['cilindrada'];
// echo $cilindrada;
$anio_fabricacion = $fila['anio_fabricacion'];
// echo $anio_fabricacion;
$precio = $fila['precio'];
// echo $precio;
$stock = $fila['stock'];
// echo $stock;
// Se cierra la conexión de base de datos
$mysqli->close();
?>

<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php -->

<form action="edit_action.php" method="post">
		<div>
			<label for="name">Marca</label>
			<input type="text" name="marca" id="marca" value="<?php echo $marca;?>" required>
		</div>

		<div>
			<label for="surname">Modelo</label>
			<input type="text" name="modelo" id="modelo" value="<?php echo $modelo;?>" required>
		</div>

		<div>
			<label for="age">Año fabricación</label>
			<input type="number" name="anio_fabricacion" id="anio_fabricacion" value="<?php echo $anio_fabricacion;?>" required>
		</div>

		<div>
			<label for="job">Cilindrada</label>
			<select name="cilindrada" id="cilindrada" placeholder="cilindrada">
				<option value="<?php echo $cilindrada;?>" selected><?php echo $cilindrada;?></option>
				<option value="125cc">125cc</option>
				<option value="250cc">250cc</option>
				<option value="300cc">300cc</option>
				<option value="350cc">350cc</option>
				<option value="450cc">450cc</option>
			</select>	
		</div>
        <div>
			<label for="age">Precio</label>
			<input type="number" name="precio" id="precio" value="<?php echo $precio;?>" required>
		</div>
        <div>
			<label for="age">Stock</label>
			<input type="number" name="stock" id="stock" value="<?php echo $stock;?>" required>
		</div>
        <div >
			<input type="hidden" name="motos_id" value=<?php echo $idmotos;?>>
			<input type="submit" name="modifica" value="Guardar" onclick="location.href='index.php'">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>
    </main>    
    <footer>
        Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>

