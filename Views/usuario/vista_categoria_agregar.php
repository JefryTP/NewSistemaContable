<style>
    .card {
        max-width: 500px;
        /* Ajusta el ancho máximo deseado */
        width: 100%;
    }

    @media (max-width: 576px) {
        .card {
            max-width: 100%;
        }
    }
</style>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Agregar Categoria</h3>
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="dni">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md">
                    <label for="nombre">Descripcion:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="6" placeholder="Ingrese Descripcion"></textarea>
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
    $('#btn_registrar').click(function() {
        var nombre = $('#nombre').val();
        var descripcion = $('#descripcion').val();

        var url = '../Controllers/Agregar/agregar_categoria.php'

        // Expresiones regulares para las validaciones
        var regexNombreApellido = /^[a-zA-Z\s]+$/;
        var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var regexContraseña = /^.{8,}$/;


        // Validación del nombre
        if (!regexNombreApellido.test(nombre)) {
            $('#nombre').val('');
            Swal.fire("Ingrese un nombre válido", "", "error");
            $('#nombre').focus();
            return;
        }

        // Validación del apellido
        if (!regexNombreApellido.test(descripcion)) {
            $('#descripcion').val('');
            Swal.fire("Ingrese un apellido válido", "", "error");
            $('#descripcion').focus();
            return;
        }

        $.post(url, {
            nombre: nombre,
            descripcion: descripcion,
        }, function(datos) {
            var respuesta = JSON.parse(datos);
            if (respuesta.error === 1) {
                Swal.fire(respuesta.mensaje, "", "error");
            } else {
                Swal.fire(respuesta.mensaje, "", "success");
                $('#nombre').val('');
                $('#descripcion').val('');
            }

        });
    });
</script>