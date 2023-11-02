<link rel="stylesheet" type="text/css" href="style.css">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_cliente = $_POST["nombre_cliente"];
    $fecha_turno = $_POST["fecha_turno"];
    $hora_turno = $_POST["hora_turno"];
    $telefono = $_POST["telefono"];
    $mail = $_POST["mail"];
    $sexo = $_POST["sexo"];

    // Conexión a la base de datos (modifica las credenciales)
    $conn = new mysqli("localhost", "root", "", "punto");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Insertar el turno en la base de datos
    $sql = "INSERT INTO turnos (nombre_cliente, fecha_turno, hora_turno, telefono, mail, sexo) VALUES ('$nombre_cliente', '$fecha_turno', '$hora_turno', '$telefono', '$mail', '$sexo' )";
    if ($conn->query($sql) === TRUE) {
        // Inserción exitosa
        echo '<div class="success-message">Turno guardado correctamente.</div>';
        echo '<div class="center-button"><a href="descargar_comprobante.php" download class="custom-button">Descargar Comprobante</a></div>';
    } else {
        // Error en la inserción
        echo '<div class="error-message">Error al guardar el turno: ' . $conn->error . '</div>';
    }

    $conn->close();
}
?>
