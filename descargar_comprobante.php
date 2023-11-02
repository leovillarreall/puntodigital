<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('fpdf/fpdf.php'); // Asegúrate de incluir la biblioteca FPDF

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "punto");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener los datos del último turno guardado
$sql = "SELECT nombre_cliente, fecha_turno, hora_turno, telefono, mail FROM turnos ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta SQL: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Datos obtenidos de la base de datos
    $nombre_cliente = $row["nombre_cliente"];
    $fecha_turno = $row["fecha_turno"];
    $hora_turno = $row["hora_turno"];
    $telefono = $row["telefono"];
    $mail = $row["mail"];
    

    // Establecer el tipo de contenido y el encabezado de descarga
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="comprobante_turno.pdf"');

    // Crear un objeto PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Comprobante de Turno', 0, 1, 'C'); // Título centrado

    // Agregar los datos debajo del título
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nombre del Cliente: ' . $nombre_cliente, 0, 1);
    $pdf->Cell(0, 10, 'Fecha del Turno: ' . $fecha_turno, 0, 1);
    $pdf->Cell(0, 10, 'Hora del Turno: ' . $hora_turno, 0, 1);


    // Agregar la hora del turno
    $pdf->Cell(0, 10, 'Telefono de Contacto: ' . $telefono, 0, 1);
    // Agregar la hora del turno
    $pdf->Cell(0, 10, 'Mail de Contacto: ' . $mail, 0, 1);

    

    // Generar el comprobante en un archivo PDF
    $pdf->Output();
} else {
    echo "No se encontraron datos en la base de datos.";
}

$conn->close();
?>
