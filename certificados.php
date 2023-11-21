<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas Aptas para el Certificado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Personas Aptas para el Certificado</h1>
    <form id="certificadoForm" action="generar_certificado.php" method="post" target="_blank" enctype="multipart/form-data">
        <input type="hidden" name="curso_id" value="<?php echo $_GET['id']; ?>">
        <ul>
            <?php
            // Conexión a la base de datos
            $con = mysqli_connect("localhost", "root", "", "puntod");
            if (!$con) {
                die("Error al conectar a la base de datos: " . mysqli_connect_error());
            }

            // Obtener el ID del curso desde la URL
            if (isset($_GET['id'])) {
                $cursos_id = $_GET['id'];

                // Consulta para obtener personas aptas para el certificado en el curso seleccionado
                $query = "SELECT personas.id, personas.nombre, asistencias.faltas
                    FROM asistencias
                    INNER JOIN personas ON asistencias.personas_id = personas.id
                    WHERE asistencias.faltas < 2 AND asistencias.cursos_id = ?";

                // Preparar la consulta
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "i", $cursos_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    // Mostrar personas aptas para el certificado
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li>Certificado para ' . $row['nombre'] . '</li>';
                    }
                } else {
                    echo "No se encontraron personas aptas para el certificado en este curso.";
                }

                // Cerrar la consulta preparada
                mysqli_stmt_close($stmt);
            } else {
                echo "ID del curso no especificado en la URL.";
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($con);
            ?>
        </ul>
        <button type="button" id="descargarCertificado">Generar Certificado</button>
    </form>

    <script>
        document.getElementById('descargarCertificado').addEventListener('click', function () {
            var form = document.getElementById('certificadoForm');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.responseType = 'blob'; // Para manejar archivos binarios como PDF

            xhr.onload = function () {
                var blob = new Blob([xhr.response], { type: 'application/pdf' });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'certificado.pdf';
                link.click();
            };

            xhr.send(new FormData(form));
        });
    </script>
</body>
</html>












