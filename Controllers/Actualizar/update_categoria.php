<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];
    $id = $_POST['id'];
    //$idUsuarioActual = $_SESSION['ID_trabajador'];

    /*if ($id == $idUsuarioActual) {
        echo json_encode(array('error' => 1, 'mensaje' => 'No puedes actualizar el estado de tu propio registro.'));
        exit;
    }*/

    require_once '../../conexion.php';

    // Realizar la consulta de actualización
    $updateSql = "UPDATE `categoria` SET `Nombre`='$nombre', `Descripcion`='$descripcion', `Estado`='$estado' WHERE `id`='$id'";

    if ($conexion->query($updateSql) === TRUE) {
        echo json_encode(array('error' => 0, 'mensaje' => 'Cambios aplicados correctamente.'));
    } else {
        echo json_encode(array('error' => 1, 'mensaje' => 'Error al aplicar los cambios: ' . $conexion->error));
    }

    $conexion->close();
} else {
    echo json_encode(array('error' => 1, 'mensaje' => 'No se ha enviado ningún formulario.'));
}