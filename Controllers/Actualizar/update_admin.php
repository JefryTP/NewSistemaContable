<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    $estado = $_POST['estado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $cargo = $_POST['cargo'];

    require_once '../../conexion.php';

    // Validar y sanitizar los datos recibidos
    $nombre = trim($nombre);
    $apellido = trim($apellido);
    $correo = trim($correo);
    $contraseña = trim($contraseña);

    if (empty($nombre) || empty($apellido) || empty($correo) || empty($contraseña)) {
        header('Content-Type: application/json');

        echo json_encode(array('error' => 1, 'mensaje' => 'Debes proporcionar todos los campos.'));
        exit;
    }

    // Preparar la consulta de actualización
    $updateSql = "UPDATE `usuario` SET `nombre`=?, `apellido`=?, `correo`=?, `contraseña`=?, `ID_rol`=?, `estado`=? WHERE `dni`=?";
    $stmt = $conexion->prepare($updateSql);
    $stmt->bind_param("ssssiii", $nombre, $apellido, $correo, $contraseña, $cargo, $estado, $dni);

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