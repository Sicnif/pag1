<?php
session_start();

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "respaldo";

if (isset($_POST["nombre_usuario"])) {
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];
    $contrasena_md5 = md5($contrasena); // Convertir la contraseña ingresada a MD5

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    // Consultar la tabla de usuarios
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario' AND contrasena='$contrasena_md5'"; // Comparar con el MD5 almacenado
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Sesión iniciada correctamente
        $usuario = $result->fetch_assoc();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["token"] = "SI";
        echo "Se inició sesión";
        // Redireccionar a inde.php y enviar el nombre de usuario como parámetro GET
        header("Location: inde.php?nombre_usuario=$nombre_usuario");
        exit();
    } else {
        echo "No hay sesión activa, favor de iniciar sesión en el sistema";
        $_SESSION["token"] = "NO";
    }

    $conn->close();
}
?>
