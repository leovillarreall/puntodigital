<!DOCTYPE html>
<html>
<head>
    <title>Lista de Cursos</title>
    <style>
            body {
            }

            h1 {
                text-align: center;
            }

            table {
                width: 80%;
                margin: 0 auto;
                border-collapse: collapse;
            }

            th, td {
                border: 1px solid #000;
                padding: 13px;
                text-align: center;
            }

            th {
                background-color: lightblue;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            tr:nth-child(odd) {
                background-color: #fff;
            }

            a {
                text-decoration: none;
            }

            .edit-button {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 6px 12px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                cursor: pointer;
            }

            .delete-button {
                background-color: #FF5733;
                color: white;
                border: none;
                padding: 6px 12px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                cursor: pointer;
            }
        </style>
</head>
<body>
    <h1>Lista de Cursos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre del Curso</th>
            <th>Acciones</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "puntod";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT id, nombre_curso FROM cursoss";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>Id " . $row['id'] . "</td>";
                echo "<td>" . $row['nombre_curso'] . "</td>";
                echo "<td><a href='editar.php?id=" . $row['id'] . "'><button style='background-color: lightblue;'>Editar</button></a> | <a href='eliminar.php?id=" . $row['id'] . "'><button style='background-color: red;'>Eliminar</button></a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No se encontraron cursos.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
