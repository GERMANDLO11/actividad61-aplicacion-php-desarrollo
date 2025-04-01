<?php
// Incluye fichero con parámetros de conexión a la base de datos
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
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <header class="text-center mb-4">
        <h1 class="text-primary fw-bold">ENDUROZONE</h1>
    </header>
    
    <main>                
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.html">Alta</a>
            </li>
        </ul>

        <h2 class="text-center text-primary p-3 rounded shadow">Modificación Moto</h2>

        <?php
        // Verifica si el parámetro 'motos_id' está en la URL
        if(isset($_GET['motos_id'])) {
            $idmotos = $_GET['motos_id'];

            // Protege el id contra inyecciones SQL
            $idmotos = $mysqli->real_escape_string($idmotos);

            // Realiza la consulta para obtener la moto a modificar
            if ($resultado = $mysqli->query("SELECT marca, modelo, cilindrada, anio_fabricacion, precio, stock FROM motos WHERE motos_id = $idmotos")) {
                // Si se obtiene el resultado
                if ($fila = $resultado->fetch_array()) {
                    $marca = $fila['marca'];
                    $modelo = $fila['modelo'];
                    $cilindrada = $fila['cilindrada'];
                    $anio_fabricacion = $fila['anio_fabricacion'];
                    $precio = $fila['precio'];
                    $stock = $fila['stock'];
                } else {
                    echo "<div class='alert alert-danger'>Moto no encontrada.</div>";
                    exit;
                }
            } else {
                echo "<div class='alert alert-danger'>Error al consultar la base de datos.</div>";
                exit;
            }

            // Cierra la conexión de base de datos
            $mysqli->close();
        } else {
            echo "<div class='alert alert-danger'>ID de moto no proporcionado.</div>";
            exit;
        }
        ?>

        <!-- FORMULARIO DE EDICIÓN -->
        <div class="card shadow p-4">
            <h2 class="text-center text-primary mb-4">Editar Moto</h2>
            <form action="edit_action.php" method="post">
                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" name="marca" id="marca" class="form-control" value="<?php echo htmlspecialchars($marca); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" name="modelo" id="modelo" class="form-control" value="<?php echo htmlspecialchars($modelo); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="anio_fabricacion" class="form-label">Año fabricación</label>
                    <input type="number" name="anio_fabricacion" id="anio_fabricacion" class="form-control" value="<?php echo htmlspecialchars($anio_fabricacion); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="cilindrada" class="form-label">Cilindrada</label>
                    <select name="cilindrada" id="cilindrada" class="form-select">
                        <option value="<?php echo htmlspecialchars($cilindrada); ?>" selected><?php echo htmlspecialchars($cilindrada); ?></option>
                        <option value="125cc">125cc</option>
                        <option value="250cc">250cc</option>
                        <option value="300cc">300cc</option>
                        <option value="350cc">350cc</option>
                        <option value="450cc">450cc</option>
                    </select>    
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control" value="<?php echo htmlspecialchars($precio); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="<?php echo htmlspecialchars($stock); ?>" required>
                </div>

                <input type="hidden" name="motos_id" value="<?php echo $idmotos; ?>">

                <div class="d-flex justify-content-between">
                    <button type="submit" name="modifica" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" onclick="location.href='index.php'">Cancelar</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="text-center mt-4">
        Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>

