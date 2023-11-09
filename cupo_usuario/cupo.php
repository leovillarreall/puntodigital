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

// Función para verificar si el cupo está completo
function isCupoCompleto($curso_id, $conn) {
    $sql = "SELECT COUNT(*) as total FROM inscripciones WHERE curso_id = $curso_id";
    $result = $conn->query($sql);
    if ($result) {
        $inscritos = $result->fetch_assoc();
        $cupo_maximo = $conn->query("SELECT cupo_maximo FROM cursos WHERE id = $curso_id")->fetch_assoc()['cupo_maximo'];
        return $inscritos['total'] >= $cupo_maximo;
    } else {
        return false;
    }
}

// Agregar un nuevo curso (para el administrador)
if (isset($_POST['agregar_curso'])) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $cupo_maximo = $_POST['cupo_maximo'];

    $sql = "INSERT INTO cursos (nombre, descripcion, cupo_maximo) VALUES ('$nombre', '$descripcion', $cupo_maximo)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Curso agregado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Listar cursos disponibles para inscripción
$cursos_disponibles = $conn->query("SELECT * FROM cursos");

// Registrar inscripción (para los usuarios)
if (isset($_POST['inscribir'])) {
    $curso_id = $_POST['curso_id'];
    $usuario_nombre = $conn->real_escape_string($_POST['usuario_nombre']);
    $usuario_email = $conn->real_escape_string($_POST['usuario_email']);

    if (!isCupoCompleto($curso_id, $conn)) {
        $sql = "INSERT INTO inscripciones (curso_id, usuario_nombre, usuario_email) VALUES ($curso_id, '$usuario_nombre', '$usuario_email')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Inscripción exitosa.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Este curso ya llego a su cupo maximo";
    }
}

// Cerrar la conexión a la base de datos después de completar todas las operaciones.
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Cursos</title>
</head>
<body>
    <h1>Administrador - Agregar Curso</h1>
    <form method="post">
        <input type="text" name="nombre" placeholder="Nombre del curso" required>
        <textarea name="descripcion" placeholder="Descripción" required></textarea>
        <input type="number" name="cupo_maximo" placeholder="Cupo máximo" required>
        <input type="submit" name="agregar_curso" value="Agregar Curso">
    </form>

    <h1>Usuarios - Inscripción a Cursos</h1>
    <?php
    $conn = new mysqli($servername, $username, $password, $dbname); // Abrir una nueva conexión

    if ($cursos_disponibles->num_rows > 0) {
        while ($curso = $cursos_disponibles->fetch_assoc()) {
            echo "<h2>{$curso['nombre']}</h2>";
            echo "<p>{$curso['descripcion']}</p>";
            echo "<p>Cantidad de Personas : {$curso['cupo_maximo']} personas</p>";
            
            echo "<form method='post'>";
            echo "<input type='hidden' name='curso_id' value='{$curso['id']}'>";
            echo "<input type='text' name='usuario_nombre' placeholder='Tu nombre' required>";
            echo "<input type='email' name='usuario_email' placeholder='Tu correo electrónico' required>";
            if (isCupoCompleto($curso['id'], $conn)) {
                echo "<p>Cupo completo</p>";
            } else {
                echo "<input type='submit' name='inscribir' value='Inscribirme'>";
            }
            echo "</form>";
        }
    } else {
        echo "No hay cursos disponibles en este momento.";
    }

    // Cerrar la nueva conexión después de completar las operaciones.
    $conn->close();
    ?>
</body>
</html>
