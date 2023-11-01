<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_paciente = $_GET["id"];
    
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "puntod";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Consulta para eliminar el paciente por su ID
    $sql = "DELETE FROM curso WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_curso);
    
    if ($stmt->execute()) {
        // Paciente eliminado exitosamente
        echo "El curso ha sido eliminado de la base de datos.";
    } else {
        echo "Error al eliminar el curso: " . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Solicitud no válida.";
}
?>
