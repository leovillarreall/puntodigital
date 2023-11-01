<?php
require('fpdf1/fpdf.php'); // Asegúrate de incluir la biblioteca FPDF (debes tener el archivo fpdf.php en el mismo directorio o especificar la ruta correcta)

// Crear un objeto PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Comprobante de Turno');

// Puedes agregar más contenido al comprobante, como información del turno

// Generar el comprobante en un archivo
$nombre_archivo = 'comprobante_turno.pdf';
$pdf->Output($nombre_archivo, 'D');
?>
