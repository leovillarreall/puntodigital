<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "puntod";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['agregar_curso'])) {
    $nombre_curso = $_POST['nombre_curso'];
    $profesor = $_POST['profesor'];
    $modalidad = $_POST['modalidad'];
    $edad_minima = $_POST['edad_minima'];
    $edad_maxima = $_POST['edad_maxima'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $cupos_limitados = $_POST['cupos_limitados'];
    $clases = $_POST['clases'];

    $rango_edad = "$edad_minima años hasta $edad_maxima años";

    $sql = "INSERT INTO cursoss (nombre_curso, profesor, modalidad, edad_minima, edad_maxima, hora_inicio, hora_fin, fecha_inicio, fecha_fin, cupos_limitados, clases)
    VALUES ('$nombre_curso', '$profesor', '$modalidad', $edad_minima, $edad_maxima, '$hora_inicio', '$hora_fin', '$fecha_inicio', '$fecha_fin', $cupos_limitados, $clases)";

    if ($conn->query($sql) === TRUE) {
        echo "Curso agregado con éxito.";
    } else {
        echo "Error al agregar el curso: " . $conn->error;
    }

    header("Location: ../formulario/index.php");
    exit;
}
?>
