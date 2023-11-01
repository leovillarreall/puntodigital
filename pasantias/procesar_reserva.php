<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "puntod";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

$mensaje = ""; // Variable para almacenar el mensaje de confirmación

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $dni = $_POST['dni'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO turnos (nombre, email, celular, dni, fecha, hora) VALUES ('$nombre', '$email', '$celular', '$dni', '$fecha', '$hora')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Turno registrado con éxito.";
    } else {
        $mensaje = "Error al registrar el turno: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Turno</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>¡Turno reservado con éxito!</h1>
    <p><?php echo $mensaje; ?></p>
    
    <a class="volver-btn" href="index.php">Volver al Inicio</a>
</body>
</html>
