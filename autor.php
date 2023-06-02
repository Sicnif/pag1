<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'conexion.php';

    $autor = $_POST['autor'];

    $sql = "SELECT * FROM publi WHERE autor = '$autor'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El autor existe en la base de datos
        // Aquí puedes redirigir al usuario al código modificado que muestra las publicaciones del autor
        header("Location: mostrar_publicaciones_autor.php?autor=$autor");
        exit();
    } else {
        // El autor no existe en la base de datos
        echo "El autor no se encuentra en la base de datos.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="estilo.css">
<head>
    <title>Verificar Autor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 5px;
            width: 200px;
        }

        button[type="submit"] {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>Verificar Autor</h1>

    <form method="POST" action="">
        <label for="autor">Nombre del autor:</label>
        <input type="text" id="autor" name="autor" required>
        <button type="submit">Verificar</button>
    </form>
</body>
</html>
