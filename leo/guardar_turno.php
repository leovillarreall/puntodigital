<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inscribir'])) {
    $curso_id = $_POST['curso_id'];
    $usuario_nombre = $_POST["usuario_nombre"];
    $fecha_turno = $_POST["fecha_turno"];
    $hora_turno = $_POST["hora_turno"];
    $telefono = $_POST["telefono"];
    $usuario_email = $_POST["usuario_email"];
    $sexo = $_POST["sexo"];
    $localidad = $_POST["localidad"];
    $edad = $_POST["edad"];

    // Conexión a la base de datos (ajusta los valores)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cursos_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Verificar nuevamente si el cupo está completo
    $curso = $conn->query("SELECT * FROM cursos WHERE id = $curso_id")->fetch_assoc();
    $inscritos = $conn->query("SELECT COUNT(*) as total FROM inscripciones WHERE curso_id = $curso_id")->fetch_assoc()['total'];
    
    if ($inscritos >= $curso['cupo_maximo']) {
        echo '<div class="error-message">Cupo completo, no se pudo inscribir.</div>';
    } else {
        // Insertar los datos del usuario en la base de datos
        $sql = "INSERT INTO inscripciones (curso_id, usuario_nombre, usuario_email, fecha_turno, hora_turno, telefono, sexo, localidad, edad) VALUES ('$curso_id', '$usuario_nombre', '$usuario_email', '$fecha_turno', '$hora_turno', '$telefono', '$sexo', '$localidad', '$edad')";

        if ($conn->query($sql) === TRUE) {
            // Inserción exitosa
            echo '<div class="success-message">Ya te anotaste correctamente.</div>';
            echo '<div class="center-button"><a href="descargar_comprobante.php" download class="custom-button">Descargar Comprobante</a></div>';
    } else {
            // Error en la inserción
            echo '<div class="error-message">Error al guardar la inscripción: ' . $conn->error . '</div>';
        }
    }

    // Cerrar la conexión a la base de datos después de completar todas las operaciones.
    $conn->close();
}
?>
