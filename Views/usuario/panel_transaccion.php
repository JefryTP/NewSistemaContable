<?php
session_start();

include('../../conexion.php');
?>
<div class="row g-3 pt-5">
    <div class="col-sm-3"></div>
    <div class="col pt-3 borde">
        <div class="row g-3 mb-3 mr-1 ml-1">
            <div class="col-sm-2">
            </div>
            <div class="col-sm">
                <h1 class="titulo-facturas">Generar Facturas</h1>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
        <div class="row g-3 mb-3 mr-1 ml-1">
            <div class="col-sm">
                <label>Cliente (opcional):</label>
                <select class="form-control" id="rucInput" name="rucInput">
                    <option value="" selected>Sin empresa asociada...</option>
                    <?php
                    $sql = "SELECT * FROM cliente";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_array($result)) {
                        if ($mostrar['estado'] == 1) {
                    ?>
                            <option value="<?php echo $mostrar['ruc']; ?>"><?php echo $mostrar['nombre']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm">
                <label>Titulo:</label>
                <input type="text" class="form-control" id="tituloInput" name="tituloInput" placeholder="Ingrese Titulo" required>
            </div>

        </div>
        <div class="row g-3 mb-3 mr-1 ml-1">
            <div class="col-sm">
                <label>Descripcion:</label>
                <textarea class="form-control" placeholder="Ingrese Descripcion" id="descriInput" name="descriInput" style="height: 100px"></textarea>
            </div>
        </div>
        <div class="row g-3 mb-3 mr-1 ml-1">
            <div class="col-sm-3">
                <label>Tipo:</label>
                <select class="form-control" id="tipoInput" name="tipoInput">
                    <?php
                    $sqlTipo = "SELECT * FROM tipo";
                    $consulta = mysqli_query($conexion, $sqlTipo);
                    while ($mostrarTipo = mysqli_fetch_array($consulta)) {
                    ?>
                        <option value="<?php echo $mostrarTipo['ID_tipo']; ?>"><?php echo $mostrarTipo['nombre']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm">
                <label>Monto:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="user-select: none;"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" class="form-control ocultar-btn-incremento" id="montoInput" name="montoInput" placeholder="Ingrese Monto" required>
                    <input type="hidden" value="<?php echo $_SESSION['dni'] ?>" id="dniInput" name="dniInput">
                </div>
            </div>
            <div class="col-sm">
                <label>Fecha:</label>
                <div class="input-group">
                    <input type="text" id="fechaInput" class="form-control" name="fechaInput" readonly>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3 mt-5 mr-1 ml-1">
            <div class="col-sm">
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-success form-control" id="btn_agregar">Generar Factura</button>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>
<script>
    $(document).ready(function() {
        // Obtener el elemento de entrada de fecha
        var fechaInput = document.getElementById('fechaInput');

        // Verificar si el elemento existe
        if (fechaInput) {
            // Obtener la fecha actual
            function actualizarFecha() {
                var fechaActual = new Date();
                var dia = fechaActual.getDate();
                var mes = fechaActual.getMonth() + 1;
                var anio = fechaActual.getFullYear();
                var hora = fechaActual.getHours();
                var minutos = fechaActual.getMinutes();

                // Formatear la fecha y hora
                var fechaFormateada = dia + '/' + mes + '/' + anio + ' ' + hora + ':' + minutos;

                // Asignar el valor formateado al campo de entrada
                fechaInput.value = fechaFormateada;
            }

            // Actualizar la fecha cada segundo (1000 milisegundos)
            setInterval(actualizarFecha, 1000);

            // Iniciar la actualización de la fecha
            actualizarFecha();
        }
    });
</script>
<script>
    $('#btn_agregar').click(function() {
        var fecha = moment().format('YYYY-MM-DD HH:mm:ss');
        var dni = $('#dniInput').val();
        var ruc = $('#rucInput').val();
        var titulo = $('#tituloInput').val();
        var descripcion = $('#descriInput').val();
        var tipo = $('#tipoInput').val();
        var monto = $('#montoInput').val();

        var url = '../Controllers/crear_transaccion.php'

        // Expresiones regulares para las validaciones

        var regexDescripcion = /^[a-zA-Z0-9\s.,\-áéíóúÁÉÍÓÚñÑ]+$/;
        var regexTEXTO = /^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑ\s]+$/;
        var regexDECIMAL = /^\d+(?:\.\d{0,2})?$/;


        // Validación del apellido
        if (!regexTEXTO.test(titulo)) {
            $('#tituloInput').addClass("is-invalid");
            $('#tituloInput').focus();
            Swal.fire("Invalido", "", "error");
            return;
        } else {
            $('#tituloInput').removeClass("is-invalid");
        }

        // Validación del correo
        if (!regexDescripcion.test(descripcion)) {
            $('#descriInput').addClass("is-invalid");
            $('#descriInput').focus();
            Swal.fire("Invalido", "", "error");
            return;
        } else {
            $('#descriInput').removeClass("is-invalid");
        }


        if (!regexDECIMAL.test(monto)) {
            $('#montoInput').addClass("is-invalid");
            $('#montoInput').focus();
            Swal.fire("Invalido", "", "error");
            return;
        } else {
            $('#montoInput').removeClass("is-invalid");
        }

        $.post(url, {
            dni: dni,
            ruc: ruc,
            titulo: titulo,
            descripcion: descripcion,
            tipo: tipo,
            monto: monto,
            fecha: fecha
        }, function(datos) {
            var respuesta = JSON.parse(datos);

            if (respuesta.error === 1) {
                Swal.fire(respuesta.mensaje, "", "error");
            } else {
                Swal.fire(respuesta.mensaje, "", "success");
                $('#tituloInput').removeClass("is-invalid");
                $('#descriInput').removeClass("is-invalid");
                $('#montoInput').removeClass("is-invalid");
                $('#rucInput').prop('selectedIndex', 0);
                $('#tituloInput').val('');
                $('#descriInput').val('');
                $('#tipoInput').prop('selectedIndex', 0);
                $('#montoInput').val('');
                $('#fechaInput').val('');
            }

        });
    });
</script>