<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear curso</title>
    <link rel="stylesheet" href="form2.css">
</head>
<body>
<header>
        <nav>
            <h1>Aqui tenes un crud de los cursos</h1>
            <img src="./img/logo.png" alt="logo">
            
        </nav>
    </header>
    
</body>
</html>
<br>
<?php
include ('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES ('$nombre', '$descripcion')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: listar_cursos.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
?>


<form method="POST" action="crear_curso.php">
    Nombre del curso: <input type="text" name="nombre"><br>
    Descripción: <textarea name="descripcion"></textarea><br>
    <input type="submit" value="Crear Curso">
</form>
