<html>
<link rel="stylesheet" type="text/css" href="estil.css">
<div id="logo-container">
    <img src="BlogTerror.png" alt="Logo" id="logo-image">
    <h1 id="slogan">Blog Terror</h1>
    <p id="slogan">¡Sumérgete en el terror!</p>
</div>

<div id="container">
    <nav>
        <ul class="menu">
        <li><a href="indes.php">Inicio</a></li>
                <li><a href="registro.php">Registrarse</a></li>
                <li><a href="prue1.html">Iniciar sesion</a></li>
                <li><a href="x">Publicaciones del mes</a></li>
                <li><a href="mostrar_publicaciones_autor.php">Buscar autor</a></li>
                <li><a href="audiopa.html">Podcast</a></li>
                <li><a href="mostrar_publicaciones.php">Ver todas las publicaciones</a></li>
        </ul>
    </nav>
    </html>
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
    <a href="indes.php">Volver al Blog</a>
</body>
</html>
