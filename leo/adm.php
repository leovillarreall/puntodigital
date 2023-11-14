<?php
// Conexión a la base de datos (ajusta los valores)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursos_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Agregar un nuevo curso (para el administrador)
if (isset($_POST['agregar_curso'])) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $cupo_maximo = $_POST['cupo_maximo'];
    $profesor = $conn->real_escape_string($_POST['profesor']);
    $modalidad = $conn->real_escape_string($_POST['modalidad']);
    $edad_minima = $_POST['edad_minima'];
    $edad_maxima = $_POST['edad_maxima'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $clases = $_POST['clases'];

    $sql = "INSERT INTO cursos (nombre, descripcion, cupo_maximo, profesor, modalidad, edad_minima, edad_maxima, hora_inicio, hora_fin, fecha_inicio, fecha_fin, clases) VALUES ('$nombre', '$descripcion', $cupo_maximo, '$profesor', '$modalidad', $edad_minima, $edad_maxima, '$hora_inicio', '$hora_fin', '$fecha_inicio', '$fecha_fin', $clases)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Curso agregado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión a la base de datos después de completar todas las operaciones.
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Cursos - Administrador</title>
</head>
<body>
    <h1>Administrador - Agregar Curso</h1>
    <form method="post">
        <input type="text" name="nombre" placeholder="Nombre del curso" required><br>
        <textarea name="descripcion" placeholder="Descripción" required></textarea><br>
        <input type="number" name="cupo_maximo" placeholder="Cupo máximo" required><br>
        <input type="text" name="profesor" placeholder="Profesor" required><br>
        <select name="modalidad" required>
            <option value="presencial">Presencial</option>
            <option value="online">Online</option>
        </select><br>
        <input type="number" name="edad_minima" placeholder="Edad mínima" required><br>
        <input type="number" name="edad_maxima" placeholder="Edad máxima" required><br>
        <label for="edad">Hora de inicio de la clase:</label>
        <input type="time" name="hora_inicio" required><br>
        <label for="edad">Hora de fin de la clase:</label>
        <input type="time" name="hora_fin" required><br>
        <label for="edad">Fecha de inicio de las clases:</label>
        <input type="date" name="fecha_inicio" required><br>
        <label for="edad">Fecha del fin de las clases:</label>
        <input type="date" name="fecha_fin" required><br>
        <input type="number" name="clases" placeholder="Cantidad de clases" required><br>
        <input type="submit" name="agregar_curso" value="Agregar Curso">
    </form>
</body>
</html>
