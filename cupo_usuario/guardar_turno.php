

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $fecha_turno = $_POST["fecha_turno"];
    $hora_turno = $_POST["hora_turno"];
    $telefono = $_POST["telefono"];
    $mail = $_POST["mail"];
    $sexo = $_POST["sexo"];
    $localidad = $_POST["localidad"];
    $edad = $_POST["edad"];

    // Conexión a la base de datos (modifica las credenciales)
    $conn = new mysqli("localhost", "root", "", "cursos_db");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Insertar el turno en la base de datos
    $sql = "INSERT INTO turnos (nombre, fecha_turno, hora_turno, telefono, mail, sexo, localidad, edad) VALUES ('$nombre', '$fecha_turno', '$hora_turno', '$telefono', '$mail', '$sexo',  '$localidad',  '$edad' )";
    if ($conn->query($sql) === TRUE) {
        // Inserción exitosa
        echo '<div class="success-message">Ya te anotaste correctamente.</div>';
        echo '<div class="center-button"><a href="descargar_comprobante.php" download class="custom-button">Descargar Comprobante</a></div>';
    } else {
        // Error en la inserción
        echo '<div class="error-message">Error al guardar el turno: ' . $conn->error . '</div>';
    }

    $conn->close();
}
?>
