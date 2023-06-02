<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "respaldo";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>
