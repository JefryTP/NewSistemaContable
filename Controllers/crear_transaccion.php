<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $dni = $_POST['dni'];
    $ruc = $_POST['ruc'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $monto = $_POST['monto'];
    $fecha = $_POST['fecha'];

    require_once '../conexion.php';
    /*var_dump($_POST);
    var_dump($dni);*/
    if ($ruc === '') {
        $insertSql = "INSERT INTO transaccion (dni, titulo, descripcion, fecha, monto, ID_tipo) VALUES ('$dni','$titulo','$descripcion','$fecha','$monto','$tipo')";
    } else {
        $insertSql = "INSERT INTO transaccion (dni, ruc, titulo, descripcion, fecha, monto, ID_tipo) VALUES ('$dni','$ruc','$titulo','$descripcion','$fecha','$monto','$tipo')";
    }

    if ($conexion->query($insertSql) === TRUE) {
        echo json_encode(array('error' => 0, 'mensaje' => 'Factura guardado correctamente.'));
    } else {
        echo json_encode(array('error' => 1, 'mensaje' => 'Error al guardar factura: ' . $conexion->error));
    }

    $conexion->close();
} else {
    //$response['mensaje'] = "No se ha enviado ningún formulario.";
    echo json_encode(array('error' => 1, 'mensaje' => 'No se ha enviado ningún formulario.'));
}
