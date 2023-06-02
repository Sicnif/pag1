<?php
require_once 'conexion.php';

// Obtener todas las publicaciones de la base de datos
$sql = "SELECT * FROM publi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['titulo'] . "</h2>";
        echo "<p>Autor: " . $row['autor'] . "</p>";
        echo "<p>Fecha: " . $row['fecha'] . "</p>";
        echo "<p>" . $row['contenido'] . "</p>";
        echo "<hr>";
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
</body>
</html>
