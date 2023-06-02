<?php
// Configuración de la base de datos
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "respaldo";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Consulta para borrar el contenido de la tabla
$sql = "DELETE FROM publi";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "El contenido de la tabla 'publi' se ha borrado correctamente.";
} else {
    echo "Error al borrar el contenido de la tabla: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
