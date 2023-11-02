<!DOCTYPE html>
<html>
<head>
    <title>Enviar de Turno</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
    <h1>Formulario de Turno</h1>
    <form action="guardar_turno.php" method="post" class="form-container"> <!-- Agrega una clase al formulario -->
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
</body>
</html>
