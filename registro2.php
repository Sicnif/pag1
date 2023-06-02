<html>
<link rel="stylesheet" type="text/css" href="esti.css">
<div id="logo-container">
    <img src="BlogTerror.png" alt="Logo" id="logo-image">
    <h1 id="slogan">Blog Terror</h1>
    <p id="slogan">¡Sumérgete en el terror!</p>
</div>

<div id="container">
    <nav>
        <ul class="menu">
        <li><a href="inde.php">Inicio</a></li>
        <li><a href="registro2.php">Registrarse</a></li>
                <li><a href="prue1.html">Iniciar sesion</a></li>
                <li><a href="x">Publicaciones del mes</a></li>
                <li><a href="mostrar_publicaciones_autor2.php">Buscar autor</a></li>
                <li><a href="nuevapublicacion.php">Agregar publicacion</a></li>
                <li><a href="audiopa2.html">Podcast</a></li>
                <li><a href="mostrar_publicaciones2.php">Ver todas las publicaciones</a></li>
        </ul>
    </nav>
    </html>
<?php
session_start();
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el nombre de usuario ya existe
    $sql = "SELECT id FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "El nombre de usuario ya está registrado. Por favor, elige otro.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES ('$nombre_usuario', '$contrasena')";
        if ($conn->query($sql) === TRUE) {
            ?>
            <!DOCTYPE html>
<html>
<a href="prue1.html">Iniciar sesión</a>
</html>
            <?php
            echo "Registro exitoso. ¡Ahora puedes iniciar sesión!";
           
        } else {
            echo "Error en el registro: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
