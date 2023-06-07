<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ruc = $_POST['ruc'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    require_once '../../conexion.php';

    $sql = "SELECT * FROM proveedor WHERE RUC = '$ruc'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode(array('error' => 1, 'mensaje' => 'El proveedor ya existe.'));
    } else {
        $insertSql = "INSERT INTO proveedor(RUC, Nombre, Direccion, Correo, Telefono, Estado) VALUES ('$ruc','$nombre','$direccion','$correo','$telefono','1')";

        if ($conexion->query($insertSql) === TRUE) {
            echo json_encode(array('error' => 2, 'mensaje' => 'Registro guardado correctamente.'));
        } else {
            echo json_encode(array('error' => 1, 'mensaje' => 'Error al guardar el registro: ' . $conexion->error));
        }
    }

    $conexion->close();
} else {
    echo json_encode(array('error' => 1, 'mensaje' => 'No se ha enviado ningún formulario.'));
}
