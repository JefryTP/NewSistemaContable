<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ruc = $_POST['ruc'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];

    require_once '../../conexion.php';

    // Validar y sanitizar los datos recibidos
    $nombre = trim($nombre);
    $correo = trim($correo);

    if (empty($ruc) || empty($nombre)) {
        header('Content-Type: application/json');

        echo json_encode(array('error' => 1, 'mensaje' => 'Debes proporcionar todos los campos.'));
        exit;
    }

    // Preparar la consulta de actualización
    $updateSql = "UPDATE `cliente` SET `nombre`=?, `correo`=?, `telefono`=?, `estado`=? WHERE `ruc`=?";
    $stmt = $conexion->prepare($updateSql);
    $stmt->bind_param("ssiii", $nombre, $correo, $telefono, $estado, $ruc);

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