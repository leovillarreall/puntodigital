<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_cliente = $_POST["nombre_cliente"];
    $fecha_turno = $_POST["fecha_turno"];
    $hora_turno = $_POST["hora_turno"];

    // Conexión a la base de datos (modifica las credenciales)
    $conn = new mysqli("localhost", "root", "", "punto");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Insertar el turno en la base de datos
    $sql = "INSERT INTO turnos (nombre_cliente, fecha_turno, hora_turno) VALUES ('$nombre_cliente', '$fecha_turno', '$hora_turno')";
    if ($conn->query($sql) === TRUE) {
        // Inserción exitosa
        echo "Turno guardado correctamente.";
        echo '<br><a href="descargar_comprobante.php" download><button>Descargar Comprobante</button></a>';
    } else {
        // Error en la inserción
        echo "Error al guardar el turno: " . $conn->error;
    }
    
    $conn->close();
}
?>
