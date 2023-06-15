<?php
include('../../conexion.php');

if (isset($_POST['ruc'])) {
    $ruc = $_POST['ruc'];

    // Realizar la consulta de eliminación
    $sql = "DELETE FROM cliente WHERE ruc = $ruc";
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
