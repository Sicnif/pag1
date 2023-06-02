<?php
session_start();

if (isset($_GET['nombre_usuario'])) {
    // Guardar el nombre de usuario en la sesión
    $_SESSION['nombre_usuario'] = $_GET['nombre_usuario'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    <link rel="stylesheet" type="text/css" href="estil.css">
    <style>
        .post-container {
            display: flex;
            flex-wrap: wrap;
        }

        .post {
            width: 48%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .post h4 {
            margin-top: 0;
        }

        .post p {
            margin-bottom: 5px;
        }

        .post hr {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #logo-container {
            display: flex;
            align-items: center;
        }

        #logo-image {
            margin-right: 10px;
        }

        #slogan {
            margin-right: 10px;
        }

        #user-greeting {
            text-align: right;
        }
    </style>
</head>
<body>
    
    <div id="logo-container">
        <img src="BlogTerror.png" alt="Logo" id="logo-image">
        <h1 id="slogan">Blog Terror &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sumérgete en las páginas, donde el terror despierta y las palabras te acechan en cada línea</h1>
        <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
        <?php if (isset($_SESSION['nombre_usuario'])) { ?>
            <?php $nombre_usuario = $_SESSION['nombre_usuario']; ?>
            <div id="user-greeting">
                <p>¡Bienvenido, <?php echo $nombre_usuario; ?>!</p>
                <a href="cerrar_sesion.php">Cerrar sesión</a>
            </div>
        <?php } else { ?>
            <div id="user-greeting">
                <p>Inicia sesión para agregar publicaciones.</p>
            </div>
        <?php } ?>
    </div>

    <div id="container">
        <nav>
            <ul class="menu">
                <li><a href="inde.php">Inicio</a></li>
                <li><a href="registro2.php">Registrarse</a></li>
                <li><a href="prue1.html">Iniciar sesión</a></li>
                <li><a href="x">Publicaciones del mes</a></li>
                <li><a href="mostrar_publicaciones_autor2.php">Buscar autor</a></li>
                <li><a href="nuevapublicacion.php">Agregar publicación</a></li>
                <li><a href="audiopa2.html">Podcast</a></li>
                <li><a href="mostrar_publicaciones2.php">Ver todas las publicaciones</a></li>
            </ul>
        </nav>

        <center><h3>Publicaciones Recientes</h3></center>

        <div class="post-container">
            <?php
            require_once 'conexion.php';

            // Obtener las últimas 5 publicaciones de la base de datos
            $sql = "SELECT * FROM publi ORDER BY fecha DESC LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="post">';
                    echo "<h4>" . $row['titulo'] . "</h4>";
                    echo "<p>Autor: " . $row['autor'] . "</p>";
                    echo "<p>Fecha: " . $row['fecha'] . "</p>";
                    echo "<p>" . $row['contenido'] . "</p>";
                    echo "<hr>";
                    echo '</div>';
                }
            } else {
                echo "<p>No hay publicaciones para mostrar.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
