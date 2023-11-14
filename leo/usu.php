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

// Listar cursos disponibles para inscripción
$cursos_disponibles = $conn->query("SELECT * FROM cursos");

// Mostrar formulario de inscripción
if ($cursos_disponibles->num_rows > 0) {
    while ($curso = $cursos_disponibles->fetch_assoc()) {
        echo "<h2>{$curso['nombre']}</h2>";
        echo "<p>{$curso['descripcion']}</p>";
        echo "<p>Cupo disponible: {$curso['cupo_maximo']} personas</p>";
        echo "<p>Profesor: {$curso['profesor']}</p>";
        echo "<p>Modalidad: {$curso['modalidad']}</p>";
        echo "<p>Edad mínima: {$curso['edad_minima']}</p>";
        echo "<p>Edad máxima: {$curso['edad_maxima']}</p>";
        echo "<p>Hora de inicio: {$curso['hora_inicio']}</p>";
        echo "<p>Hora de fin: {$curso['hora_fin']}</p>";
        echo "<p>Fecha de inicio: {$curso['fecha_inicio']}</p>";
        echo "<p>Fecha de fin: {$curso['fecha_fin']}</p>";
        echo "<p>Clases: {$curso['clases']}</p>";

        // Verificar si el cupo está completo
        $inscritos = $conn->query("SELECT COUNT(*) as total FROM inscripciones WHERE curso_id = {$curso['id']}")->fetch_assoc()['total'];
        if ($inscritos >= $curso['cupo_maximo']) {
            echo "<p>Cupo completo</p>";
        } else {
            // Mostrar formulario de inscripción
            echo "<form action='guardar_turno.php' method='post' class='form-container'>";
            echo "<input type='hidden' name='curso_id' value='{$curso['id']}'>";
            echo "<label for='nombre'>Nombre del Cursante:</label>";
            echo "<input type='text' name='usuario_nombre' required><br>";
            echo "<label for='telefono'>Número de Teléfono:</label>";
            echo "<input type='text' name='telefono' required><br>";
            echo "<label for='mail'>Mail:</label>";
            echo "<input type='text' name='usuario_email' required><br>";
            echo "<label for='localidad'>Localidad:</label>";
            echo "<input type='text' name='localidad' required><br>";
            echo "<label for='edad'>Edad:</label>";
            echo "<input type='text' name='edad' required><br>";
            echo "<label for='sexo'>Sexo:</label>";
            echo "<input type='text' name='sexo' required><br>";
            echo "<label for='fecha_turno'>Fecha del Turno:</label>";
            echo "<input type='date' name='fecha_turno' required><br>";
            echo "<label for='hora_turno'>Hora del Turno:</label>";
            echo "<input type='time' name='hora_turno' required><br>";
            echo "<input type='submit' name='inscribir' value='Inscribirme'>";
            echo "</form>";
        }
    }
} else {
    echo "No hay cursos disponibles en este momento.";
}

// Cerrar la conexión a la base de datos después de completar todas las operaciones.
$conn->close();
?>
