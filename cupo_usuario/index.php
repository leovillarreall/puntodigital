<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "cursos_db");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscripcion a Curso</title>
    
</head>
<body>
    <h1>Curso de ""</h1>
    <?php
    
    ?>
    <form action="guardar_turno.php" method="post" class="form-container">
        <label for="nombre">Nombre del Cursante:</label>
        <input type="text" name="nombre" required><br>
        <label for="telefono">Número de Teléfono:</label>
        <input type="text" name="telefono" required><br>
        <label for="mail">Mail:</label>
        <input type="text" name="mail" required><br>
        <label for="localidad">Localidad:</label>
        <input type="text" name="localidad" required><br>
        <label for="edad">Edad:</label>
        <input type="text" name="edad" required><br>


        <label for="sexo">Sexo:</label>
        <input type="text" name="sexo" required><br>
        <label for="fecha_turno">Fecha del Turno:</label>
        <input type="date" name="fecha_turno" required><br>
        <label for="hora_turno">Hora del Turno:</label>
        <input type="time" name="hora_turno" required><br>
        <input type="submit" value="Guardar Turno">
    </form>
    
  
</body>
</html>
