<?php
include('../conexion.php');
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active">Iniciar Sesion</h2>
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="imagenes/sesion.png" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <input type="number" id="dni" class="fadeIn second ocultar-btn-incremento" name="dni" placeholder="DNI">
            <input type="password" id="contrasena" class="fadeIn third" name="contrasena" placeholder="contraseña" require>
            <!--input type="submit" class="fadeIn fourth" value="Ingresar"-->
            <button type="submit" class="fadeIn fourth" id="btn_ingresar">Ingresar</button>
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

        $('#btn_ingresar').click(function() {
            var dni = $('#dni').val();
            var contrasena = $('#contrasena').val();

            var url = 'validar_usuario.php'

            // Expresiones regulares para las validaciones
            var regexNombreApellido = /^[a-zA-Z\s]+$/;
            var regexRUC = /^\d{11}$/;
            var regexDNI = /^\d{8}$/;
            var regexTEXTO = /^[a-zA-Z\s]+$/;
            var regexCORREO = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var regexContraseña = /^.{6,}$/;
            var regexTEXTO = /^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑ\s]+$/;


            // Validación del nombre
            if (!regexDNI.test(dni)) {
                $('#dni').focus();
                Swal.fire("Ingrese un dni válido", "", "error");
                return;
            }

            // Validación del apellido
            if (!regexContraseña.test(contrasena)) {
                $('#contrasena').val('');
                $('#contrasena').focus();
                Swal.fire("Ingrese una contraseña válida", "", "error");
                return;
            }

            $.post(url, {
                dni: dni,
                contrasena: contrasena
            }, function(datos) {
                var respuesta = JSON.parse(datos);
                if (respuesta.error === 1) {
                    Swal.fire(respuesta.mensaje, "", "error");
                } else {
                    $('#dni').val('');
                    $('#contrasena').val('');

                    Swal.fire({
                        text: respuesta.mensaje,
                        icon: "success",
                        showConfirmButton: true,
                        timer: 2000, // 3 segundos (3000 milisegundos)
                        //timerProgressBar: true,
                    }).then(() => {
                        window.location.href = "../Views/index.php";
                    });
                }
            });
        });
    </script>
</body>

</html>