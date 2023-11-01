<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Turno</title>
</head>
<body>
    <h1>Formulario de Turno</h1>
    <form action="guardar_turno.php" method="post">
        Nombre del Cliente: <input type="text" name="nombre_cliente" required><br>
        Fecha del Turno: <input type="date" name="fecha_turno" required><br>
        Hora del Turno: <input type="time" name="hora_turno" required><br>
        <input type="submit" value="Guardar Turno">
    </form>

    <?php
    // Verificar si el turno se ha guardado y mostrar el botón de descarga
    if (isset($_GET['guardado']) && $_GET['guardado'] === 'true') {
        echo '<a href="descargar_comprobante.php" download><button>Descargar Comprobante</button></a>';
    }
    ?>
</body>
</html>
