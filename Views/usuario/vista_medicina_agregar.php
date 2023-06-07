<?php
include('../../conexion.php');

?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Agregar Medicina</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md">
                    <label for="proveedor">Proveedor:</label>
                    <select class="custom-select rounded-0" name="proveedor" id="proveedor" required>
                        <?php
                        $sql = "SELECT m.*, p.Nombre AS nombre_proveedor, p.ID_proveedor AS id_provee, c.Nombre AS nombre_categoria, c.ID_categoria AS id_cate 
        FROM medicina m 
        INNER JOIN proveedor p ON m.ID_proveedor = p.ID_proveedor 
        INNER JOIN categoria c ON m.ID_categoria = c.ID_categoria";
                        $result = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $mostrar['id_provee']; ?>"><?php echo $mostrar['nombre_proveedor']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md">
                    <label for="categoria">Categoria:</label>
                    <select class="custom-select rounded-0" name="categoria" id="categoria" required>
                        <?php
                        $sql = "SELECT m.*, p.Nombre AS nombre_proveedor, p.ID_proveedor AS id_provee, c.Nombre AS nombre_categoria, c.ID_categoria AS id_cate 
                        FROM medicina m 
                        INNER JOIN proveedor p ON m.ID_proveedor = p.ID_proveedor 
                        INNER JOIN categoria c ON m.ID_categoria = c.ID_categoria";
                        $result = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $mostrar['id_cate']; ?>"><?php echo $mostrar['nombre_categoria']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md">
                    <label for="marca">Marca:</label>
                    <input type="text" class="form-control" name="marca" id="marca" placeholder="Ingrese Marca" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="preciuni">Precio Unitario:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="user-select: none;">S/.</span>
                        </div>
                        <input type="number" class="form-control" name="preciouni" id="preciouni" placeholder="Ingrese Precio Unitario" step="0.01" required>
                    </div>
                </div>
                <div class="col-6">
                    <label for="precixcaja">Precio por Caja:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="user-select: none;">S/.</span>
                        </div>
                        <input type="number" class="form-control" name="PrecioxCaja" id="PrecioxCaja" placeholder="Ingrese Precio por Caja" step="0.01" required>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="unixcaja">Unidad por Caja:</label>
                    <input type="number" class="form-control" name="UnidadxCaja" id="UnidadxCaja" placeholder="Ingrese Unidad por Caja" required>
                </div>
                <div class="col-6">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="Ingrese Stock" required>
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
        var proveedor = $('#proveedor').val();
        var nombre = $('#nombre').val();
        var categoria = $('#categoria').val();
        var marca = $('#marca').val();
        var preciouni = $('#preciouni').val();
        var PrecioxCaja = $('#PrecioxCaja').val();
        var UnidadxCaja = $('#UnidadxCaja').val();
        var stock = $('#stock').val();

        var url = '../Controllers/Agregar/agregar_medicina.php'

        // Expresiones regulares para las validaciones
        var regexRUC = /^\d{11}$/;
        var regexTEL = /^\d{9}$/;
        var regexTEXTO = /^[a-zA-Z\s]+$/;
        var regexCORREO = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var regexContraseña = /^.{8,}$/;
        var regexNUM = /^\d+$/;
        var regexDECIMAL = /^\d+(?:\.\d{1,2})?$/;
        var regexTextoNumeros = /^[a-zA-Z0-9\s]+$/;


        // Validación del nombre
        if (!regexTextoNumeros.test(nombre)) {
            $('#nombre').focus();
            Swal.fire("Ingrese un nombre válido", "", "error");

            return;
        }
        if (!regexTextoNumeros.test(marca)) {
            $('#marca').focus();
            Swal.fire("Ingrese una marca válido", "", "error");

            return;
        }
        if (!regexDECIMAL.test(preciouni)) {
            $('#preciouni').focus();
            Swal.fire("Ingrese un precio unitario válido", "", "error");

            return;
        }
        if (!regexDECIMAL.test(PrecioxCaja)) {
            $('#PrecioxCaja').focus();
            Swal.fire("Ingrese un precio por caja válido", "", "error");
            return;
        }

        if (!regexNUM.test(UnidadxCaja)) {
            $('#UnidadxCaja').focus();
            Swal.fire("Ingrese las unidades por caja correctamente", "", "error");
            return;
        }

        if (!regexNUM.test(stock)) {
            $('#stock').focus();
            Swal.fire("Ingrese un stock válido", "", "error");
            return;
        }

        $.post(url, {
            proveedor: proveedor,
            nombre: nombre,
            categoria: categoria,
            marca: marca,
            preciouni: preciouni,
            PrecioxCaja: PrecioxCaja,
            UnidadxCaja: UnidadxCaja,
            stock: stock
        }, function(datos) {
            var respuesta = JSON.parse(datos);
            if (respuesta.error === 1) {
                Swal.fire(respuesta.mensaje, "", "error");
            } else {
                Swal.fire(respuesta.mensaje, "", "success");
                $('#proveedor').val('');
                $('#nombre').val('');
                $('#categoria').val('');
                $('#marca').val('');
                $('#preciouni').val('');
                $('#PrecioxCaja').val('');
                $('#UnidadxCaja').val('');
                $('#stock').val('');
            }

        });
    });
</script>