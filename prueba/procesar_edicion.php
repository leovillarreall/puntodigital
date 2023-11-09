<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "puntod";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso_id = $_POST['id'];
    $nombre_curso = $_POST['nombre_curso'];
    // Agrega aquí el procesamiento de otros campos del curso

    $sql = "UPDATE cursoss SET nombre_curso = '$nombre_curso' WHERE id = $curso_id";
    // Agrega aquí las actualizaciones de otros campos del curso

    if ($conn->query($sql) === TRUE) {
        echo "Curso editado con éxito.";
    } else {
        echo "Error al editar el curso: " . $conn->error;
    }

    header("Location: mostrar.php");
}

$conn->close();
?>
