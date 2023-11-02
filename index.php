<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "punto");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Define el límite máximo de inscripciones
$limite_inscripciones = 50;

// Consulta para contar el número de inscripciones
$sql = "SELECT COUNT(*) as total_inscripciones FROM turnos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_inscripciones = $row["total_inscripciones"];

    if ($total_inscripciones >= $limite_inscripciones) {
        $cupo_lleno = true;
    } else {
        $cupo_lleno = false;
    }
} else {
    echo "Error al contar las inscripciones: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Turno</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Curso de ""</h1>
    <?php
    if (!$cupo_lleno) {
    ?>
    <form action="guardar_turno.php" method="post" class="form-container">
        <label for="nombre_cliente">Nombre del Cliente:</label>
        <input type="text" name="nombre_cliente" required><br>
        <label for="telefono">Número de Teléfono:</label>
        <input type="text" name="telefono" required><br>
        <label for="mail">Mail:</label>
        <input type="text" name="mail" required><br>
        <label for="sexo">Sexo:</label>
        <input type="text" name="sexo" required><br>
        <label for="fecha_turno">Fecha del Turno:</label>
        <input type="date" name="fecha_turno" required><br>
        <label for="hora_turno">Hora del Turno:</label>
        <input type="time" name="hora_turno" required><br>
        <input type="submit" value="Guardar Turno">
    </form>
    <?php
    } else {
        echo '<p class="cupo-lleno">Lo sentimos, el cupo máximo de inscripciones se ha alcanzado.</p>';
    }
    ?>
</body>
</html>
