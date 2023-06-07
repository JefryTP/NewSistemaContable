<?php
include('../conexion.php');

// Verificar si se recibió un ID válido
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $permiso = $_POST['permiso'];
    if ($permiso == 1) {
        $cargo = '
        <select name="orden_select" id="orden_select" class="form-control">
            <option value="0">Usuario</option>
            <option value="1" selected>Administrador</option>
        </select>';
    } else {
        $cargo = '
        <select name="orden_select" id="orden_select" class="form-control">
            <option value="0" selected>Usuario</option>
            <option value="1">Administrador</option>
        </select>';
    }
    $estado = $_POST['estado'];
    if ($estado == 1) {
        $est = '
        <select name="estado_select" id="estado_select" class="form-control">
            <option value="0">Inactivo</option>
            <option value="1" selected>Activo</option>
        </select>';
    } else {
        $est = '
        <select name="estado_select" id="estado_select" class="form-control">
            <option value="0" selected>Inactivo</option>
            <option value="1">Activo</option>
        </select>';
    }


    // Realizar la consulta para obtener los datos del registro a editar
    $sql = "SELECT * FROM trabajador WHERE ID_trabajador = '$id'";
    $result = mysqli_query($conexion, $sql);

    // Verificar si se encontró el registro
    if ($mostrar = mysqli_fetch_assoc($result)) {
        // Los datos del registro se encuentran en el arreglo $mostrar

        // Construir el formulario de edición
        $form = '<div class="card card-primary">
        <form id="form_editar" action="actualizar_admin.php" method="POST">
    <input type="hidden" name="id" value="' . $mostrar['ID_trabajador'] . '">
    <div class="form-group">
        <div class="row">
            <div class="col-md">
            <label for="dni">DNI:</label>
            <input type="number" class="form-control" name="dni" value="' . $mostrar['DNI'] . '" required>
            </div>
            <div class="col-md">
            <label for="estado">Estado:</label>
            ' . $est . '
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="' . $mostrar['Nombre'] . '" required>
            </div>
            <div class="col-md">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" name="apellido" value="' . $mostrar['Apellido'] . '" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
        <div class="col-md">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" class="form-control" name="correo" value="' . $mostrar['Correo'] . '" required>
        </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md">
            <label for="estado">Cargo:</label>
            ' . $cargo . '
            </div>
            <div class="col-md">
            <label for="contrasena">Contraseña:</label>
        <input type="text" class="form-control" name="contrasena" value="' . $mostrar['Contraseña'] . '" required>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-10">
    <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
    </div>
</form>
</div>';

        // Enviar el formulario como una respuesta JSON al cliente
        echo json_encode(['form' => $form]);
    } else {
        // No se encontró el registro
        echo json_encode(['error' => 'Registro no encontrado']);
    }
} else {
    // No se recibió un ID válido
    echo json_encode(['error' => 'ID invalido']);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
