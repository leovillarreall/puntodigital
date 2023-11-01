<?php
include ('conexion.php');

$sql = "SELECT * FROM imagenes";
$resultado = $conexion->query($sql);
?>

<!-- Lista de cursos -->
<table>
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    <?php
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['descripcion'] . "</td>";
            echo "<td><a href='editar.php?id=" . $fila['id'] . "'>Editar</a> | <a href='borrar.php?id=" . $fila['id'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
    } else {
        echo "No hay cursos disponibles.";
    }
    ?>
</table>
