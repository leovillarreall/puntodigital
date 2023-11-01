<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>
    <link rel="stylesheet" type="text/css" href="llamado.css">
    <link rel="icon" href="logo.png" type="logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-image: url('fondo.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
<h1>Editar Paciente</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    
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

    // Consulta para obtener los datos del paciente por su ID
    $sql = "SELECT * FROM curso WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Aquí puedes mostrar un formulario para editar los datos del paciente
        // Mostrar un formulario para editar los datos del paciente
        echo '<form action="guardar_edicion.php" method="POST">';
        echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
        
        echo '<label for="curso">Nombre del Curso:</label>';
        echo '<input type="text" id="curso" name="curso" value="' . $row["curso"] . '"><br>';
        
        echo '<label for="profesor">Profesor:</label>';
        echo '<input type="text" id="profesor" name="profesor" value="' . $row["profesor"] . '"><br>';
        
        echo '<label for="inicio">Fecha de inicio:</label>';
        echo '<input type="date" id="inicio" name="inicio" value="' . $row["inicio"] . '"><br>';
        
        echo '<label for="fin">Fecha de fin:</label>';
        echo '<input type="date" id="fin" name="fin" value="' . $row["fin"] . '"><br>';
        
        echo '<label for="descripcion">Descripcion:</label>';
        echo '<input type="text" id="descripcion" name="descripcion" value="' . $row["descripcion"] . '"><br>';

        echo '<input type="submit" value="Guardar Cambios">';
        echo '</form>';
    } else {
        echo "Paciente no encontrado.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>

</body>
</html>
