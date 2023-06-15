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
                                                    <button type="button" class="btn btn-info btn_editar"><i class="far fa-edit"></i></button>
                                                    <!--Codigo para separar los botones class="... ml-2"-->
                                                    <?php if ($_SESSION['nombre_rol'] != "Trabajador") { ?>
                                                        <button type="button" class="btn btn-danger btn_eliminar"><i class="fas fa-trash-alt"></i></button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>