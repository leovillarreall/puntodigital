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

    $sql = "DELETE FROM cursoss WHERE id = $curso_id";

    if ($conn->query($sql) === TRUE) {
        echo "Curso eliminado con éxito.";
    } else {
        echo "Error al eliminar el curso: " . $conn->error;
    }

    header("Location: mostrar.php");
} else {
    echo "ID del curso no proporcionado.";
}

$conn->close();
?>
