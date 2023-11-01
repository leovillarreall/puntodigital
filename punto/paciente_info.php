<button onclick="location.href='inicio_ficha.php'">Volver al inicio </button>
<style>
        body {
            background-image: url('fondo.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Añade más estilos según sea necesario */
        }
    </style>

<?php
$curso = $_GET['curso'];

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

// Consultar la ficha médica del paciente
$sql = "SELECT * FROM curso WHERE curso = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $curso);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Mostrar los datos de la ficha médica
    echo "<h1>Nombre del curso $curso</h1>";
    echo "<div class='ficha'>";
    echo "<p><strong>Nombre de curso:</strong> " . $row["curso"] . "</p>";
    echo "<p><strong>Profesor:</strong> " . $row["profesor"] . "</p>";
    echo "<p><strong>Fecha de inicio:</strong> " . $row["inicio"] . "</p>";
    echo "<p><strong>Fecha de fin:</strong> " . $row["fin"] . "</p>";
    echo "<p><strong>Descripcion:</strong> " . $row["descripcion"] . "</p>";
    echo "</div>";
} else {
    echo "<p>No se encontraron coincidencias.</p>";
}

$stmt->close();
$conn->close();
?>
