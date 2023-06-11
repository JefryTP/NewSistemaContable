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
            <form action="validar_usuario.php" method="post" id="loginForm">
                <input type="text" id="login" class="fadeIn second" name="dni" placeholder="DNI">
                <input type="password" id="password" class="fadeIn third" name="contrasena" placeholder="contraseña">
                <!--input type="submit" class="fadeIn fourth" value="Ingresar"-->
                <button type="submit" class="fadeIn fourth" id="btn_ingresar">Ingresar</button>
            </form>
            <!-- Remind Passowrd -->
            <!--div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </!--div-->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
        var regexContraseña = /^.{8,}$/;
        var regexTEXTO = /^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑ\s]+$/;


        // Validación del nombre
        if (!regexDNI.test(dni)) {
            $('#dni').val('');
            Swal.fire("Ingrese un nombre válido", "", "error");
            $('#dni').focus();
            return;
        }

        // Validación del apellido
        if (!regexNombreApellido.test(contrasena)) {
            $('#contrasena').val('');
            Swal.fire("Ingrese un apellido válido", "", "error");
            $('#contrasena').focus();
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
    <?php
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error === 'correo-no-ingresada') {
            echo '<script>
                Swal.fire("Correo no ingresado", "", "error");
              </script>';
        } elseif ($error === 'contraseña-no-ingresada') {
            echo '<script>
                Swal.fire("Contraseña no ingresada", "", "error");
              </script>';
        } elseif ($error === 'datos-no-ingresados') {
            echo '<script>
                Swal.fire("Datos no ingresados", "", "error");
              </script>';
        } elseif ($error === 'correo-inhabilitado') {
            echo '<script>
                Swal.fire("Correo inhabilitado", "", "error");
              </script>';
        } elseif ($error === 'cuenta-no-encontrada') {
            echo '<script>
                Swal.fire("Cuenta no encontrada", "", "error");
              </script>';
        }
    }
    ?>


</body>

</html>