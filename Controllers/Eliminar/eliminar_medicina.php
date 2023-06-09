<?php
include('../../conexion.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Realizar la consulta de eliminación
    $sql = "DELETE FROM medicina WHERE ID_medicina = $id";
    if (mysqli_query($conexion, $sql)) {
        // Éxito en la eliminación
        echo json_encode(array('status' => 'success', 'message' => 'Registro eliminado correctamente.'));
    } else {
        // Error en la eliminación
        echo json_encode(array('status' => 'error', 'message' => 'Error al eliminar el registro.'));
    }
} else {
    // No se proporcionó el ID del registro a eliminar
    echo json_encode(array('status' => 'error', 'message' => 'No se proporcionó el ID del registro.'));
}

mysqli_close($conexion);
