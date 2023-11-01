<?php
include ('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = "UPDATE imagenes SET nombre='$nombre', descripcion='$descripcion' WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: listar_cursos.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM imagenes WHERE id=$id";
$resultado = $conexion->query($sql);
$curso = $resultado->fetch_assoc();
?>

<!-- Formulario para editar un curso -->
<form method="POST" action="editar.php">
    <input type="hidden" name="id" value="<?php echo $curso['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $curso['nombre']; ?>"><br>
    Descripción: <textarea name="descripcion"><?php echo $curso['descripcion']; ?></textarea><br>
    <input type="submit" value="Guardar Cambios">
</form>
