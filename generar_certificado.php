<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// generar_certificado.php

require ('fpdf1/fpdf.php');

if (isset($_POST['generate_pdf'])) {
    // Recuperar el ID del curso desde el formulario
    $cursos_id = $_POST['curso_id'];

    // Conexión a la base de datos
    $con = mysqli_connect("localhost", "root", "", "puntod");
    if (!$con) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

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

    // Crear un nuevo objeto PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    while ($row = mysqli_fetch_assoc($result)) {
        // Agregar contenido al PDF para cada persona apta
        $pdf->Cell(0, 10, "Certificado para " . $row['nombre'], 0, 1, 'C');
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);

    // Cerrar la conexión a la base de datos
    mysqli_close($con);

    // Descargar el PDF
    $pdf->Output();
}
?>


