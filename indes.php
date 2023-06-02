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
    </style>
</head>
<body>
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
    <center><h2>Bienvenido al Blog</h2></center>

    <?php if (isset($_SESSION['nombre_usuario'])) { ?>
        <p>¡Hola, <?php echo $_SESSION['nombre_usuario']; ?>!</p>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    <?php } else { ?>
        <center><p>Inicia sesión para agregar publicaciones.</p></center>
    <?php } ?>

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