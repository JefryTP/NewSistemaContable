<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Agregar Proveedor</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="dni">RUC:</label>
                    <input type="number" class="form-control ocultar-btn-incremento" name="ruc" id="ruc" placeholder="Ingrese RUC" required>
                </div>
                <div class="col-6">
                    <label for="dni">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md">
                    <label for="nombre">Direccion:</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese Direccion" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="dni">Correo Electronico:</label>
                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese Correo Electronico" required>
                </div>
                <div class="col-6">
                    <label for="dni">Telefono:</label>
                    <input type="number" class="form-control ocultar-btn-incremento" name="telefono" id="telefono" placeholder="Ingrese Telefono" required>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary" id="btn_registrar">Registrar</button>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var inputRUC = document.getElementById('ruc');

    inputRUC.addEventListener('input', function() {
        var value = this.value;
        if (value.length > 11) {
            value = value.slice(0, 11);
            this.value = value;
        }
    });
    var inputTEL = document.getElementById('telefono');

    inputTEL.addEventListener('input', function() {
        var value = this.value;
        if (value.length > 9) {
            value = value.slice(0, 9);
            this.value = value;
        }
    });
    $('#btn_registrar').click(function() {
        var ruc = $('#ruc').val();
        var nombre = $('#nombre').val();
        var direccion = $('#direccion').val();
        var correo = $('#correo').val();
        var telefono = $('#telefono').val();

        var url = '../Controllers/Agregar/agregar_proveedor.php'

        // Expresiones regulares para las validaciones
        var regexRUC = /^\d{11}$/;
        var regexTEL = /^\d{9}$/;
        var regexTEXTO = /^[a-zA-Z\s]+$/;
        var regexCORREO = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var regexContraseña = /^.{8,}$/;


        // Validación del nombre
        if (!regexRUC.test(ruc)) {
            $('#ruc').focus();
            Swal.fire("Ingrese un ruc válido", "", "error");

            return;
        }
        if (!regexTEXTO.test(nombre)) {
            $('#nombre').focus();
            Swal.fire("Ingrese un nombre válido", "", "error");

            return;
        }
        if (!regexTEXTO.test(direccion)) {
            $('#direccion').focus();
            Swal.fire("Ingrese una direccion válido", "", "error");

            return;
        }
        if (!regexCORREO.test(correo)) {
            $('#correo').focus();
            Swal.fire("Ingrese un correo válido", "", "error");
            return;
        }

        if (!regexTEL.test(telefono)) {
            $('#telefono').focus();
            Swal.fire("Ingrese un telefono válido", "", "error");
            return;
        }

        $.post(url, {
            ruc: ruc,
            nombre: nombre,
            direccion: direccion,
            correo: correo,
            telefono: telefono
        }, function(datos) {
            var respuesta = JSON.parse(datos);
            if (respuesta.error === 1) {
                Swal.fire(respuesta.mensaje, "", "error");
            } else {
                Swal.fire(respuesta.mensaje, "", "success");
                $('#ruc').val('');
                $('#nombre').val('');
                $('#direccion').val('');
                $('#correo').val('');
                $('#telefono').val('');
            }

        });
    });
</script>