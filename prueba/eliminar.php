<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Curso</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        /* Estilo para el fondo transparente opaco */
        .modal-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* Fondo opaco con un poco de transparencia */
            z-index: 1;            
        }

        /* Estilo para el contenido del modal */
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        /* Estilo para el botón de eliminar */
        .delete-button {
            background-color: #FF5733;
            color: white;
            border: none;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
    </style>
</head>
<body>

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

        // Consulta para obtener los datos del curso a eliminar
        $sql = "SELECT nombre_curso FROM cursoss WHERE id = $curso_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Mostrar un mensaje de confirmación en un modal
            echo '<div class="modal-container" id="confirmationModal">';
            echo '<div class="modal-content">';
            echo '¿Seguro que deseas eliminar el curso: ' . $row['nombre_curso'] . '?<br>';
            echo '<a href="procesar_eliminacion.php?id=' . $curso_id . '">Sí, Eliminar</a> | <a href="mostrar.php">No, Cancelar</a>';
            echo '</div>';
            echo '</div>';
            // JavaScript para mostrar el modal
            echo '<script>';
            echo 'document.getElementById("confirmationModal").style.display = "block";';
            echo '</script>';
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
