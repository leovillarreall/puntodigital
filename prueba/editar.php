<!DOCTYPE html>
<html>
<head>
    <title>Editar Curso</title>
    <style>
        body {
        }
        h1 {
            text-align: center;
        }
        form {
            width: 60%;
            margin: 0 auto;
            padding: 48px;
            border: 10px solid lightblue;
            background-color: #fff;
        }
        label {
            display: block;
            margin: 10px 0;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        input[type="submit"] {
            background-color: lightblue;
            color: #000;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Editar Curso</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "puntod";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $curso_id = $_GET['id'];
        
        // Consulta para obtener los datos del curso a editar
        $sql = "SELECT * FROM cursoss WHERE id = $curso_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Mostrar un formulario con los datos actuales para que el usuario edite
            echo '<form method="post" action="procesar_edicion.php">';
            echo '<input type="hidden" name="id" value="' . $curso_id . '">';
            echo 'Nombre del Curso: <input type="text" name="nombre_curso" value="' . $row['nombre_curso'] . '"><br>';
            echo 'Profesor que dicta el Curso: <input type="text" name="profesor" value="' . $row['profesor'] . '"><br>';
            echo 'Modalidad: <select name="modalidad">';
            echo '<option value="presencial" ' . ($row['modalidad'] == 'presencial' ? 'selected' : '') . '>Presencial</option>';
            echo '<option value="semipresencial" ' . ($row['modalidad'] == 'semipresencial' ? 'selected' : '') . '>Semipresencial</option>';
            echo '<option value="virtual" ' . ($row['modalidad'] == 'virtual' ? 'selected' : '') . '>Virtual</option>';
            echo '</select><br>';
            echo 'Edad Mínima: <input type="number" name="edad_minima" value="' . $row['edad_minima'] . '"><br>';
            echo 'Edad Máxima: <input type="number" name="edad_maxima" value="' . $row['edad_maxima'] . '"><br>';
            echo 'Horario de Inicio: <input type="time" name="hora_inicio" value="' . $row['hora_inicio'] . '"><br>';
            echo 'Horario de Fin: <input type="time" name="hora_fin" value="' . $row['hora_fin'] . '"><br>';
            echo 'Fecha de Inicio: <input type="date" name="fecha_inicio" value="' . $row['fecha_inicio'] . '"><br>';
            echo 'Fecha de Fin: <input type="date" name="fecha_fin" value="' . $row['fecha_fin'] . '"><br>';
            echo 'Cupos Limitados: <input type="number" name="cupos_limitados" value="' . $row['cupos_limitados'] . '"><br>';
            echo 'Clases: <input type="number" name="clases" value="' . $row['clases'] . '"><br>';
            echo '<input type="submit" value="Guardar Cambios">';
            echo '</form>';
        } else {
            echo "Curso no encontrado.";
        }
    } else {
        echo "ID del curso no proporcionado.";
    }

    $conn->close();
    ?>
</body>
</html>
