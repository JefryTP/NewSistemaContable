<?php
//$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $dni = $_POST['dni'];
  $estado = $_POST['estado'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $contraseña = $_POST['contraseña'];
  $cargo = $_POST['cargo'];

  require_once '../../conexion.php';

  $sql = "SELECT * FROM usuario WHERE dni = '$dni'";
  $result = $conexion->query($sql);

  if ($result->num_rows > 0) {
    // El proveedor ya existe
    //$response['mensaje'] = "El proveedor ya existe en la base de datos.";
    echo json_encode(array('error' => 1, 'mensaje' => 'El trabajador ya existe.'));
  } else {
    // Insertar el nuevo proveedor
    $insertSql = "INSERT INTO usuario (dni, nombre, apellido, Correo, Contraseña, ID_rol, Estado) VALUES ('$dni', '$nombre', '$apellido', '$correo', '$contraseña', '$cargo','$estado')";

    if ($conexion->query($insertSql) === TRUE) {
      //$response['mensaje'] = "Registro guardado correctamente en la base de datos.";
      echo json_encode(array('error' => 2, 'mensaje' => 'Registro guardado correctamente.'));
    } else {
      //$response['mensaje'] = "Error al guardar el registro: " . $conexion->error;
      echo json_encode(array('error' => 1, 'mensaje' => 'Error al guardar el registro: ' . $conexion->error));
    }
  }

  $conexion->close();
} else {
  //$response['mensaje'] = "No se ha enviado ningún formulario.";
  echo json_encode(array('error' => 1, 'mensaje' => 'No se ha enviado ningún formulario.'));
}

// Devolver la respuesta como JSON
/*header('Content-Type: application/json');*/
//json_encode($response);
