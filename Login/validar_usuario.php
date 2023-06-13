<?php
session_start();

include('../conexion.php');
/*require 'conexion.php';*/
if (isset($_POST['dni']) && isset($_POST['contrasena'])) {

    $dni = $_POST['dni'];
    $clave = $_POST['contrasena'];

    if (empty($dni)) {
        echo json_encode(array('error' => 1, 'mensaje' => 'Ingrese el DNI.'));
        exit();
    } elseif (empty($clave)) {
        echo json_encode(array('error' => 1, 'mensaje' => 'Ingrese la contraseña.'));
        exit();
    } else {
        $sql = "SELECT * FROM usuario WHERE dni = '$dni' AND contraseña = '$clave'";
        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['dni'] === $dni && $row['contraseña'] === $clave) {
                if ($row['estado'] == 1) {
                    $rolSql = "SELECT nombre FROM rol WHERE ID_rol = " . $row['ID_rol'];
                    $rolResult = mysqli_query($conexion, $rolSql);
                    $rolRow = mysqli_fetch_assoc($rolResult);


                    $_SESSION['dni'] = $row['dni'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['apellido'] = $row['apellido'];
                    $_SESSION['correo'] = $row['correo'];
                    $_SESSION['contraseña'] = $row['contraseña'];
                    $_SESSION['ID_rol'] = $row['ID_rol'];
                    $_SESSION['estado'] = $row['estado'];
                    $_SESSION['nombre_rol'] = $rolRow['nombre'];
                    echo json_encode(array('error' => 0, 'mensaje' => 'Sesion iniciada correctamente.'));
                    exit();
                } else {
                    echo json_encode(array('error' => 1, 'mensaje' => 'La cuenta esta inhabilitada, comuniquese con un administrador.'));
                    exit();
                }
            } else {
                echo json_encode(array('error' => 1, 'mensaje' => 'El usuario no existe.'));
                exit();
            }
        } else {
            echo json_encode(array('error' => 1, 'mensaje' => 'El usuario no existe.'));
            exit();
        }
    }
} else {
    echo json_encode(array('error' => 1, 'mensaje' => 'Error al enviar los datos.'));
    exit();
}
