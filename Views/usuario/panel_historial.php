<?php
session_start();
include('../../conexion.php');
?>
<div>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="content-header">
                    <div class="container-fluid">
                        <h1 class="titulo">Historial</h1>
                    </div><!-- /.container-fluid -->
                </section>
                <button id="btn_descargar">Descargar Excel</button>
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-striped display" data-page-length="10">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">DNI trabajador</th>
                                        <th scope="col">Trabajador</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    $sql = "SELECT tr.*, c.nombre AS nombre_cliente, u.nombre AS nombre_usuario, ti.nombre AS nombre_tipo 
FROM transaccion tr 
LEFT JOIN cliente c ON tr.ruc = c.ruc
INNER JOIN usuario u ON tr.dni = u.dni
INNER JOIN tipo ti ON tr.ID_tipo = ti.ID_tipo";
                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>

                                            <td><?php echo $mostrar['ID_transaccion'] ?></td>
                                            <td><?php echo $mostrar['fecha'] ?></td>
                                            <td><?php echo $mostrar['dni'] ?></td>
                                            <td><?php echo $mostrar['nombre_usuario'] ?></td>
                                            <td><?php if ($mostrar['nombre_cliente'] == NULL) {
                                                    echo "Sin Empresa asignada";
                                                } else {
                                                    echo $mostrar['nombre_cliente'];
                                                }
                                                ?></td>
                                            <td><?php echo $mostrar['titulo'] ?></td>
                                            <td><?php echo $mostrar['monto'] ?></td>
                                            <td><?php if ($mostrar['nombre_tipo'] == "Egreso") {
                                                ?> <button type="button" class="btn btn-danger btn-disabled" style="pointer-events: none;"><?php echo $mostrar['nombre_tipo'] ?></button><?php
                                                                                                                                                                                        } else {
                                                                                                                                                                                            ?> <button type="button" class="btn btn-success btn-disabled" style="pointer-events: none;"><?php echo $mostrar['nombre_tipo'] ?></button><?php
                                                                                                                                                                                                                                                                                                                                    }  ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn_ver" data-idtrans="<?php echo $mostrar['ID_transaccion']; ?>" data-fecha="<?php echo $mostrar['fecha']; ?>" data-dni="<?php echo $mostrar['dni']; ?>" data-nombre_usuario="<?php echo $mostrar['nombre_usuario']; ?>" data-nombre_cliente="<?php echo $mostrar['nombre_cliente']; ?>" data-titulo="<?php echo $mostrar['titulo']; ?>" data-monto="<?php echo $mostrar['monto']; ?>" data-nombre_tipo="<?php echo $mostrar['nombre_tipo']; ?>" data-ruc="<?php echo $mostrar['ruc']; ?>" data-descripcion="<?php echo $mostrar['descripcion']; ?>"><i class="fas fa-eye"></i></button>
                                                    <!--Codigo para separar los botones class="... ml-2"-->
                                                    <?php if ($_SESSION['nombre_rol'] != "Trabajador") { ?>
                                                        <button type="button" class="btn btn-danger btn_eliminar" data-idtrans="<?php echo $mostrar['ID_transaccion']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>


                                    <?php
                                    }
                                    ?>
                                </tbody>
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
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
    document.getElementById('btn_descargar').addEventListener('click', function() {
        // Obtener el contenido de la tabla
        var table = document.getElementById('myTable');

        // Crear un libro de Excel
        var workbook = XLSX.utils.book_new();

        // Crear una hoja de Excel y convertir la tabla en un objeto de datos
        var worksheet = XLSX.utils.table_to_sheet(table);

        // Añadir la hoja al libro
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Datos');

        // Generar un archivo binario a partir del libro
        var excelBuffer = XLSX.write(workbook, {
            bookType: 'xlsx',
            type: 'array'
        });

        // Convertir el archivo binario a Blob
        var blob = new Blob([excelBuffer], {
            type: 'application/octet-stream'
        });

        // Crear un enlace de descarga y establecer el archivo Blob
        var link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'tabla.xlsx';

        // Simular el clic en el enlace para iniciar la descarga
        link.click();
    });
</script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script>
    $('.btn_ver').click(function() {

        var idtrans = $(this).data('idtrans');
        var fecha = $(this).data('fecha');
        var dni = $(this).data('dni');
        var nombre_usuario = $(this).data('nombre_usuario');
        var nombre_cliente = $(this).data('nombre_cliente');
        var titulo = $(this).data('titulo');
        var monto = $(this).data('monto');
        var nombre_tipo = $(this).data('nombre_tipo');
        var ruc = $(this).data('ruc');
        var descripcion = $(this).data('descripcion');

        Swal.fire({
            title: 'Factura -' + fecha,
            html: `
            <div class="col pt-3 borde form-group">
            <div class="row g-3">
                <div class="col-sm">
                    <label>ID</label>
                    <input class="form-control" value="${idtrans}" disabled>
                </div>
                <div class="col-sm">
                    <label>Titulo</label>
                    <input class="form-control" value="${titulo}" disabled>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm">
                    <label>DNI</label>
                    <input class="form-control" value="${dni}" disabled>
                </div>
                <div class="col-sm">
                    <label>Trabajador</label>
                    <input class="form-control" value="${nombre_usuario}" disabled>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm">
                    <label>RUC</label>
                    <input class="form-control" value="${ruc}" disabled>
                </div>
                <div class="col-sm">
                    <label>Empresa</label>
                    <input class="form-control" value="${nombre_cliente}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>Monto</label>
                    <input class="form-control" value="${monto}" disabled>
                </div>
                <div class="col-md-3">
                    <label>Tipo</label>
                    <input class="form-control" value="${nombre_tipo}" disabled>
                </div>
                <div class="col-md">
                    <label>Fecha</label>
                    <input class="form-control" value="${fecha}" disabled>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm">
                    <label>Descripcion:</label>
                    <textarea class="form-control" rows="3" disabled>${descripcion}</textarea>
                </div>
            </div>
        `,
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        });
    });
    $('.btn_eliminar').click(function() {
        var fila = $(this).closest('tr'); // Obtener la fila padre del botón de eliminar
        var idtransaccion = $(this).data('idtrans');
        // Confirmar la eliminación utilizando SweetAlert
        //console.log(idtransaccion);
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
                    url: '../Controllers/Eliminar/eliminar_transaccion.php',
                    type: 'POST',
                    data: {
                        id: idtransaccion
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