<?php
include('../../conexion.php');
?>

<!-- Content Wrapper. Contains page content -->
<div>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="content-header">
                    <div class="container-fluid">
                        <h1 class="titulo">Panel Cliente</h1>
                    </div><!-- /.container-fluid -->
                </section>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="btn">
                                <button type="button" class="btn btn-primary btn_agregar">Agregar</button>
                            </div>
                            <table id="myTable" class="table table-bordered table-striped display">
                                <thead>
                                    <tr>
                                        <th scope="col">RUC</th>
                                        <th scope="col">EMPRESA</th>
                                        <th scope="col">CORRREO</th>
                                        <th scope="col">TELEFONO</th>
                                        <th scope="col">ESTADO</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM cliente";
                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>

                                            <td><?php echo $mostrar['ruc'] ?></td>
                                            <td><?php echo $mostrar['nombre'] ?></td>
                                            <td><?php echo $mostrar['correo'] ?></td>
                                            <td><?php echo $mostrar['telefono'] ?></td>
                                            <td><?php if ($mostrar['estado'] == 0) {
                                                ?>
                                                    <button type="button" class="btn btn-secondary btn-disabled" style="pointer-events: none;">Inactivo</button>
                                                <?php
                                                } else {
                                                ?>  <button type="button" class="btn btn-success btn-disabled" style="pointer-events: none;">Activo</button>
                                                <?php  
                                                }  
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn_editar" data-ruc="<?php echo $mostrar['ruc']; ?>" data-nombre="<?php echo $mostrar['nombre']; ?>" data-correo="<?php echo $mostrar['correo']; ?>" data-telefono="<?php echo $mostrar['telefono']; ?>" data-estado="<?php echo $mostrar['estado']; ?>"><i class="far fa-edit"></i></button>
                                                    <!--Codigo para separar los botones class="... ml-2"-->
                                                    <button type="button" class="btn btn-danger btn_eliminar" data-ruc="<?php echo $mostrar['ruc']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
    $('.btn_agregar').click(function() {
        var id = $(this).data('id');
        var ruc = $(this).data('ruc');
        var nombre = $(this).data('nombre');
        var correo = $(this).data('correo');
        var telefono = $(this).data('telefono');
        var estado = $(this).data('estado');
        var opciones = `
        <option value="1" selected>Activo</option>`;
        Swal.fire({
            title: 'Agregar Cliente',
            html: `
        <form id="create-cliente">
            <div class="form-group">
                <div class="row">
                    <div class="col-md">
                        <label for="ruc">RUC:</label>
                        <input type="number" class="form-control ocultar-btn-incremento" name="ruc" required>
                    </div>
                    <div class="col-md">
                        <label for="estado">Estado:</label>
                        <select class="form-control" name="estado" readonly>
                            ${opciones}
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="nombre">Empresa:</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                    <div class="col-md">
                        <label for="telefono">Telefono:</label>
                        <input type="text" class="form-control" name="telefono" required>
                    </div>
                </div>
                <input type="hidden" name="id" value="${id}">
            </div>
        </form>`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aplicar'
        }).then((result) => {
            if (result.isConfirmed) {
                var datos = $('#create-cliente').serialize();
                var url = "../Controllers/Agregar/agregar_cliente.php";

                var regexTEXTO = /^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑ\s]+$/;
                if (!regexTEXTO.test(nombre)) {
                    Swal.fire("Ingrese un nombre válido", "", "error");
                    return;
                }

                $.post(url, datos, function(respuesta) {

                    if (datos.error === 1) {
                        Swal.fire(respuesta.mensaje, "", "error");

                    } else {
                        Swal.fire(respuesta.mensaje, "", "success");
                    }
                });
            }
        });
    });
    $('.btn_editar').click(function() {
        var id = $(this).data('id');
        var ruc = $(this).data('ruc');
        var nombre = $(this).data('nombre');
        var correo = $(this).data('correo');
        var telefono = $(this).data('telefono');
        var estado = $(this).data('estado');
        if (estado == 1) {
            var opciones = `
        <option value="0">Inactivo</option>
        <option value="1" selected>Activo</option>`;
        } else {
            var opciones = `
        <option value="0" selected>Inactivo</option>
        <option value="1">Activo</option>`;
        }
        Swal.fire({
            title: 'Actualizar Registro',
            html: `
        <form id="update-cliente">
            <div class="form-group">
                <div class="row">
                    <div class="col-md">
                        <label for="ruc">RUC:</label>
                        <input type="number" class="form-control ocultar-btn-incremento" name="ruc" value="${ruc}" readonly>
                    </div>
                    <div class="col-md">
                        <label for="estado">Estado:</label>
                        <select class="form-control" name="estado" required>
                            ${opciones}
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="nombre">Empresa:</label>
                        <input type="text" class="form-control" name="nombre" value="${nombre}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" name="correo" value="${correo}" required>
                    </div>
                    <div class="col-md">
                        <label for="telefono">Telefono:</label>
                        <input type="text" class="form-control" name="telefono" value="${telefono}" required>
                    </div>
                </div>
                <input type="hidden" name="id" value="${id}">
            </div>
        </form>`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aplicar'
        }).then((result) => {
            if (result.isConfirmed) {
                var datos = $('#update-cliente').serialize();
                var url = "../Controllers/Actualizar/update_cliente.php";

                var regexTEXTO = /^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑ\s]+$/;
                var regexCORREO = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!regexTEXTO.test(nombre)) {
                    Swal.fire("Ingrese un nombre válido", "", "error");
                    return;
                }
                if (!regexCORREO.test(correo)) {
                    Swal.fire("Ingrese un correo válido", "", "error");
                    return;
                }

                $.post(url, datos, function(respuesta) {

                    if (datos.error === 1) {
                        Swal.fire(respuesta.mensaje, "", "error");

                    } else {
                        Swal.fire(respuesta.mensaje, "", "success");
                    }
                });
            }
        });
    });
    $('.btn_eliminar').click(function() {
        var fila = $(this).closest('tr'); // Obtener la fila padre del botón de eliminar
        var ruccliente = $(this).data('ruc');
        // Confirmar la eliminación utilizando SweetAlert
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'

        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar solicitud AJAX para eliminar el registro
                $.ajax({
                    url: '../Controllers/Eliminar/eliminar_cliente.php',
                    type: 'POST',
                    data: {
                        ruc: ruccliente
                    },
                    success: function(response) {
                        // Mostrar mensaje de éxito
                        Swal.fire('Eliminado', 'El registro ha sido eliminado correctamente.', 'success');
                        // Eliminar la fila de la tabla
                        fila.remove();
                    },
                    error: function() {
                        // Mostrar mensaje de error en caso de fallo en la solicitud AJAX
                        Swal.fire('Error', 'No se pudo eliminar el registro.', 'error');
                    }
                });
            }
        });
    });
</script>
