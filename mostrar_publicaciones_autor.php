
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'conexion.php';

    $autor = $_POST['autor'];

    $sql = "SELECT * FROM publi WHERE autor = '$autor' ORDER BY fecha DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $publicaciones = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $publicaciones = [];
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    
<head>
    <title>Blog</title>
    
    <link rel="stylesheet" type="text/css" href="esti.css">
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
    </nav>
    
</head>
<body>
   
    <h1>Bienvenido al Blog</h1>

    <?php if (isset($_SESSION['nombre_usuario'])) { ?>
        <p>¡Hola, <?php echo $_SESSION['nombre_usuario']; ?>!</p>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    <?php } ?>

    <h2>Publicaciones Recientes</h2>

    <?php if (isset($publicaciones) && !empty($publicaciones)) { ?>
        <div class="publicaciones">
            <?php foreach ($publicaciones as $publicacion) { ?>
                <div class="publicacion">
                    <h3><?php echo $publicacion['titulo']; ?></h3>
                    <p>Autor: <?php echo $publicacion['autor']; ?></p>
                    <p>Fecha: <?php echo $publicacion['fecha']; ?></p>
                    <p><?php echo $publicacion['contenido']; ?></p>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <center><p>No hay publicaciones para mostrar.</p></center>
    <?php } ?>
   
    <!-- Resto del código -->
  
    <?php if (isset($_SESSION['nombre_usuario'])) { ?>
        
    <?php } ?>

    <h2>Buscar publicaciones por autor</h2>
    <br> <br>
    <center><form method="POST" action="">
        <label for="autor">Nombre del autor:</label>
        <input type="text" id="autor" name="autor" required>
        <button type="submit">Buscar</button>
        <br> <br>
        <a href="mostrar_publicaciones.php">Ver todas las publicaciones</a>
        <a href="indes.php">Regresar al blog</a> </center
    </form>
</body>
</html>
