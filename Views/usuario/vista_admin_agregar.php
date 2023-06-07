<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Agregar Administrador</h3>
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="dni">DNI:</label>
                    <input type="number" class="form-control ocultar-btn-incremento" name="dni" id="dni" placeholder="Ingrese DNI">
                </div>
                <div class="col-6">
                    <label for="estado">Cargo:</label>
                    <select class="custom-select rounded-0" name="estado" id="estado" required>
                        <option value="0">Trabajador</option>
                        <option value="1">Supervisor</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre" required>
                </div>
                <div class="col-6">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese Apellido" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="correo">Correo Electronico:</label>
                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese Correo" required>
                </div>
                <div class="col-6">
                    <label for="contra">Contraseña:</label>
                    <input type="text" class="form-control" name="contra" id="contraseña" placeholder="Ingrese Contraseña" required>
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
    var inputDNI = document.getElementById('dni');

    inputDNI.addEventListener('input', function() {
        var value = this.value;
        if (value.length > 8) {
            value = value.slice(0, 8);
            this.value = value;
        }
    });
    $('#btn_registrar').click(function() {
        var dni = $('#dni').val();
        var estado = $('#estado').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var correo = $('#correo').val();
        var contraseña = $('#contraseña').val();

        var url = '../Controllers/Agregar/agregar_admin.php'

        // Expresiones regulares para las validaciones
        var regexDNI = /^\d{8}$/;
        var regexNombreApellido = /^[a-zA-Z\s]+$/;
        var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var regexContraseña = /^.{8,}$/;

        // Validación del DNI
        if (!regexDNI.test(dni)) {
            $('#dni').focus();
            Swal.fire("Ingrese un DNI válido", "", "error");
            return;
        }

        // Validación del nombre
        if (!regexNombreApellido.test(nombre)) {
            $('#nombre').focus();
            Swal.fire("Ingrese un nombre válido", "", "error");
            return;
        }

        // Validación del apellido
        if (!regexNombreApellido.test(apellido)) {
            $('#apellido').focus();
            Swal.fire("Ingrese un apellido válido", "", "error");
            return;
        }

        // Validación del correo
        if (!regexCorreo.test(correo)) {
            $('#correo').focus();
            Swal.fire("Ingrese un correo electrónico válido", "", "error");
            return;
        }

        // Validación de la contraseña
        if (!regexContraseña.test(contraseña)) {
            $('#contraseña').focus();
            Swal.fire("La contraseña debe tener al menos 8 caracteres", "", "error");
            return;
        }

        $.post(url, {
            dni: dni,
            estado: estado,
            nombre: nombre,
            apellido: apellido,
            correo: correo,
            contraseña: contraseña
        }, function(datos) {
            var respuesta = JSON.parse(datos);
            if (respuesta.error === 1) {
                Swal.fire(respuesta.mensaje, "", "error");
            } else {
                Swal.fire(respuesta.mensaje, "", "success");
                $('#dni').val('');
                $('#estado').prop('selectedIndex', 0);
                $('#nombre').val('');
                $('#apellido').val('');
                $('#correo').val('');
                $('#contraseña').val('');
            }

        });
    });

    /*function validarFormulario() {
        // Código AJAX para enviar el formulario
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controllers/agregar_admin.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                mostrarSweetAlert(response.mensaje);
            } else {
                alert('Error en la solicitud. Inténtalo de nuevo.');
            }
        };
        var formData = new FormData(form);
        xhr.send(new URLSearchParams(formData));
        return false; // Evitar el envío del formulario
    }

    function mostrarSweetAlert(mensaje) {
        Swal.fire({
            title: 'Éxito',
            text: mensaje,
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    }*/
</script>
<!--div>
    <form method="POST">
        <h1>Registrar Administrador</h1>
        <input type="text" name="Nom" placeholder="Nombre">
        <input type="text" name="Ape" placeholder="Apellido">
        <input type="email" name="Email" placeholder="Correo">
        <input type="text" name="DNI" placeholder="DNI">
        <input type="text" name="Contra" placeholder="Contraseña">
        <select name="Cargo">
            <option value="0">Administrador</option>
            <option value="1">Supervisor</option>
        </select>
        <input type="submit" name="agregar-admin">
    </form>

</!--div-->