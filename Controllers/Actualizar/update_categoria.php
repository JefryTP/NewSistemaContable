<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];
    $id = $_POST['id'];

    require_once '../../conexion.php';

    // Validar y sanitizar los datos recibidos
    $nombre = trim($nombre);
    $descripcion = trim($descripcion);

    if (empty($nombre) || empty($descripcion)) {
        header('Content-Type: application/json');

        echo json_encode(array('error' => 1, 'mensaje' => 'Debes proporcionar todos los campos.'));
        exit;
    }

    // Preparar la consulta de actualización
    $updateSql = "UPDATE `categoria` SET `Nombre`=?, `Descripcion`=?, `Estado`=? WHERE `ID_categoria`=?";
    $stmt = $conexion->prepare($updateSql);
    $stmt->bind_param("ssii", $nombre, $descripcion, $estado, $id);

    if ($stmt->execute()) {
        // Verificar si se actualizó alguna fila
        if ($stmt->affected_rows > 0) {
            header('Content-Type: application/json');

            echo json_encode(array('error' => 0, 'mensaje' => 'Cambios aplicados correctamente.'));
        } else {
            header('Content-Type: application/json');

            echo json_encode(array('error' => 1, 'mensaje' => 'No se realizó ninguna actualización.'));
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('error' => 1, 'mensaje' => 'Error al aplicar los cambios: ' . $conexion->error));
    }

    $stmt->close();
    $conexion->close();
} else {
    header('Content-Type: application/json');

    echo json_encode(array('error' => 1, 'mensaje' => 'No se ha enviado ningún formulario.'));
}