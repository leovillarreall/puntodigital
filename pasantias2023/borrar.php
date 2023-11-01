<?php
include ('conexion.php');

$id = $_GET['id'];
$sql = "DELETE FROM imagenes WHERE id=$id";

if ($conexion->query($sql) === TRUE) {
    header("Location: listar_cursos.php");
} else {
    echo "Error al eliminar el curso: " . $conexion->error;
}
?>
