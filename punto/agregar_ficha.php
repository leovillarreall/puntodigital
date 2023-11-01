<?php

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

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso = $_POST["curso"];
    $profesor = $_POST["profesor"];
    $inicio = $_POST["inicio"];
    $fin = $_POST["fin"];
    $descripcion = $_POST["descripcion"];


    // Insertar los datos en la base de datos
    $sql = "INSERT INTO curso (curso, profesor, inicio, fin, descripcion ) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $curso, $profesor, $inicio, $fin, $descripcion);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar el paciente: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="ficha.css">
    <title>Ficha Médica</title>
    <style>
        body {
            background-image: url('fondo.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Añade más estilos según sea necesario */
        }
    </style>
</head>
<body>
    <h1>Ficha Médica</h1>
    <button onclick="location.href='inicio_ficha.php'">Volver al inicio </button>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="curso">Nombre del curso:</label>
        <input type="text" name="curso" required><br>
        
        <label for="profesor">Profesor:</label>
        <input type="text" name="profesor" required><br>

        <label for="inicio">Fecha de Inicio:</label>
        <input type="date" name="inicio" required><br>

        <label for="fin">Fecha de Ficha:</label>
        <input type="date" name="fin"><br>

        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion"><br>

        <input type="submit" value="Registrar Curso">
        
    </form>
</body>
</html>
