<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    require_once '../../conexion.php';

    $sql = "SELECT * FROM categoria WHERE Nombre = '$nombre'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // El proveedor ya existe
        echo json_encode(array('error' => 1, 'mensaje' => 'La categoria ya existe.'));
    } else {
        // Insertar el nuevo proveedor
        $insertSql = "INSERT INTO categoria(Nombre, Descripcion,Estado) VALUES ('$nombre','$descripcion','1')";

        if ($conexion->query($insertSql) === TRUE) {
            echo json_encode(array('error' => 2, 'mensaje' => 'Registro guardado correctamente.'));
        } else {
            echo json_encode(array('error' => 1, 'mensaje' => 'Error al guardar el registro: ' . $conexion->error));
        }
    }

    $conexion->close();
} else {
    //$response['mensaje'] = "No se ha enviado ningún formulario.";
    echo json_encode(array('error' => 1, 'mensaje' => 'No se ha enviado ningún formulario.'));
}
