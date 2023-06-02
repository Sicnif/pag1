<?php
require_once 'conexion.php';

// Agregar una nueva publicación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $fecha = $_POST['fecha'];
 
    $contenido = $_POST['contenido'];

    $sql = "INSERT INTO publi ( titulo, autor, fecha, contenido) VALUES ('$titulo', '$autor', '$fecha', '$contenido')";
    if ($conn->query($sql) === TRUE) {
        echo "Publicación agregada correctamente.";
    } else {
        echo "Error al agregar la publicación: " . $conn->error;
    }
}

// Obtener todas las publicaciones de la base de datos
$sql = "SELECT * FROM publi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
       
    }
} else {
    echo "No hay publicaciones para mostrar.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Publicaciones</title>
</head>
<body>
    <h1>Publicaciones</h1>
    <a href="inde.php">Volver al Blog</a>

    <h2>Agregar nueva publicación</h2>
    <form method="POST" action="">
    
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" required><br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" id="fecha" name="fecha" required><br>

        <label for="contenido">Contenido:</label><br>
        <textarea id="contenido" name="contenido" required></textarea><br>

        <input type="submit" value="Agregar">
    </form>
</body>
</html>
