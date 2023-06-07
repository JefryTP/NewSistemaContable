<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Panel de Venta</h3>
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="dni">DNI:</label>
                    <input type="textr" class="form-control" name="dni" id="dni" placeholder="Ingrese DNI" required>
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