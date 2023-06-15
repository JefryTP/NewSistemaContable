<?php
//$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $ruc = $_POST['ruc'];
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $estado = $_POST['estado'];

  require_once '../../conexion.php';

  $sql = "SELECT * FROM cliente WHERE ruc = '$ruc'";
  $result = $conexion->query($sql);

  if ($result->num_rows > 0) {
    // El proveedor ya existe
    //$response['mensaje'] = "El proveedor ya existe en la base de datos.";
    echo json_encode(array('error' => 1, 'mensaje' => 'El trabajador ya existe.'));
  } else {
    // Insertar el nuevo proveedor
    $insertSql = "INSERT INTO cliente (ruc, nombre, correo, telefono, estado) VALUES ('$ruc', '$nombre', '$correo', '$telefono', '$estado')";

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
