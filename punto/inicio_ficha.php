<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Título de Página</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>Punto Digital</h1>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>

    <style>
        body {
            background-image: url('fondo.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .carpeta {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
        }
        .carpeta a {
            text-decoration: none;
            color: #000;
        }
        .botones {
            display: flex;
        }
        .botones a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 5px;
        }
        .boton-editar {
            background-color: #3498db;
            color: #fff;
        }
        .boton-eliminar {
            background-color: #e74c3c;
            color: #fff;
        }
    </style>
</head>
<body>
<h1>Lista de Cursos</h1>
<button onclick="location.href='agregar_ficha.php'">Agregar curso</button>
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

// Consultar los nombres de los pacientes desde la base de datos
$sql = "SELECT * FROM curso";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar carpetas con los nombres de los pacientes y botones de Editar y Eliminar
    echo '<div style="display: flex; flex-wrap: wrap;">';
    while ($row = $result->fetch_assoc()) {
        $carpeta_url = urlencode($row["curso"]);
        echo '<div class="carpeta">';
        echo '<a href="paciente_info.php?curso=' . $carpeta_url . '">' . htmlspecialchars($row["curso"]) . '</a>';
        echo '<div class="botones">';
        echo '<a href="editar_paciente.php?id=' . $row["id"] . '" class="boton-editar">Editar</a>';
        echo '<a href="eliminar_paciente.php?id=' . $row["id"] . '" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este paciente?\')" class="boton-eliminar">Eliminar</a>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "No se encontraron registros en la base de datos.";
}

// Cerrar la conexión
$conn->close();
?>    </main>
    <footer>
        <p>Derechos de autor © 2023 - Mi Empresa</p>
    </footer>
</body>
</html>



