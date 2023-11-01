<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id_curso = $_POST["id"];
    
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

    // Obtener los datos del formulario
        $curso = $_POST["curso"];
        $profesor = $_POST["profesor"];
        $inicio = $_POST["inicio"];
        $fin = $_POST["fin"];
        $descripcion = $_POST["descripcion"];
    // Agrega más campos adicionales aquí

    // Actualizar los datos del paciente en la base de datos
    $sql = "UPDATE curso SET curso=?, profesor=?, inicio=?, fin=?, descripcion=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi",  $curso, $profesor, $inicio, $fin, $descripcion, $id_curso);

    if ($stmt->execute()) {
        echo "Edición exitosa. Los datos del paciente han sido actualizados.";
    } else {
        echo "Error al editar los datos del paciente: " . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Solicitud no válida.";
}
?>
