<?php
session_start();

include('../conexion.php');
/*require 'conexion.php';*/
if (isset($_POST['correo']) && isset($_POST['contrasena'])) {

    echo "Conexion GOD";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $correo = validate($_POST['correo']);
    $clave = validate($_POST['contrasena']);

    if (empty($correo)) {
        header("Location: index.php?error=correo-no-ingresada");
        exit();
    } elseif (empty($clave)) {
        header("Location: index.php?error=contraseña-no-ingresada");
        exit();
    } else {
        $sql = "SELECT * FROM trabajador WHERE Correo = '$correo' AND Contraseña = '$clave'";
        /*$sql = "SELECT t.*, tr.* FROM trabajador tr
        INNER JOIN tipo_documento t ON tr.ID_tipo = t.ID_tipo
        WHERE tr.Correo = '$correo' AND tr.Contraseña = '$clave'";*/
        $result = mysqli_query($conexion, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Correo'] === $correo && $row['Contraseña'] === $clave) {
                if ($row['Estado'] == 1) {
                    $_SESSION['Nombre'] = $row['Nombre'];
                    $_SESSION['Apellido'] = $row['Apellido'];
                    $_SESSION['Correo'] = $row['Correo'];
                    $_SESSION['DNI'] = $row['DNI'];
                    $_SESSION['Permiso'] = $row['Permiso'];
                    $_SESSION['ID_trabajador'] = $row['ID_trabajador'];
                    header("Location: ../Views/index.php");
                    exit();
                } else {
                    header("Location: index.php?error=correo-inhabilitado");
                    exit();
                }
            } else {
                header("Location: index.php?error=cuenta-no-encontra");
                exit();
            }
        } else {
            header("Location: index.php?error=cuenta-no-encontrada");
            exit();
        }
    }
} else {
    header("Location: index.php?error=fallo-enviar-datos");
    exit();
}
