<?php
session_start();
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales de inicio de sesión
    $sql = "SELECT id FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Iniciar sesión y redirigir al usuario a la página principal
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        header("Location: indes.php");
    } else {
        echo "Credenciales inválidas. Por favor, intenta nuevamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre_usuario
