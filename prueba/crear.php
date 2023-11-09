<!DOCTYPE html>
<html>
<head>
    <title>Cargar Formulario</title>
    <style>
        body {
        }
        h1 {
            text-align: center;
        }
        form {
            width: 60%;
            margin: 0 auto;
            padding: 48px;
            border: 10px solid lightblue;
            background-color: #fff;
        }
        label {
            display: block;
            margin: 10px 0;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        input[type="submit"] {
            background-color: lightblue;
            color: #000;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Crear/Agregar Curso</h1>
    <form method="post" action="crear2.php">
        Nombre del Curso: <input type="text" name="nombre_curso"><br>
        Profesor que dicta el Curso: <input type="text" name="profesor"><br>
        Modalidad:
        <select name="modalidad">
            <option value="presencial">Presencial</option>
            <option value="semipresencial">Semipresencial</option>
            <option value="virtual">Virtual</option>
        </select><br>
        Edad Mínima: <input type="number" name="edad_minima"><br>
        Edad Máxima: <input type="number" name="edad_maxima"><br>
        Horario de Inicio: <input type="time" name="hora_inicio"><br>
        Horario de Fin: <input type="time" name="hora_fin"><br>
        Fecha de Inicio: <input type="date" name="fecha_inicio"><br>
        Fecha de Fin: <input type="date" name="fecha_fin"><br>
        Cupos Limitados: <input type="number" name="cupos_limitados"><br>
        Clases: <input type="number" name= "clases"><br>
        <input type="submit" name="agregar_curso" value="Agregar Curso">
    </form>
</body>
</html>
