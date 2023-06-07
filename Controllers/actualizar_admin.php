<?php
include('../conexion.php');

if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Obtener los valores actualizados del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];
    $contrasena = $_POST['contrasena'];

    // Realizar la consulta de actualización
    $sql = "UPDATE trabajador SET Nombre = '$nombre', Apellido = '$apellido', Correo = '$correo', DNI = '$dni', Contraseña = '$contrasena' WHERE ID_trabajador = '$id'";

    if (mysqli_query($conexion, $sql)) {
        // La actualización se realizó correctamente
        echo json_encode(['success' => 'Los datos se actualizaron correctamente']);
    } else {
        // Ocurrió un error durante la actualización
        echo json_encode(['error' => 'Error al actualizar los datos']);
    }
} else {
    // No se recibió un ID válido
    echo json_encode(['error' => 'ID inválido']);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
