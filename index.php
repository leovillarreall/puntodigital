<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu Página de Inicio</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
 
    <h1>Lista de Cursos</h1>
    <ul>
        <?php
        // Conexión a la base de datos
        $con = mysqli_connect("localhost", "root", "", "puntod");
        if (!$con) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        // Consulta para obtener la lista de cursos
        $query = "SELECT id, nombre_curso FROM cursos";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><a href='certificados.php?id=" . $row['id'] . "'>" . $row['nombre_curso'] . "</a></li>";
            }
        } else {
            echo "No se encontraron cursos.";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($con);
        ?>
    </ul>
</body>
</html>


