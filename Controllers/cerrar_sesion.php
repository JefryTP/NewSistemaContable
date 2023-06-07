<?php
session_start();
session_destroy();

// Redirigir a una página de cierre de sesión o a cualquier otra página
header('Location: ../Login/index.php');
exit();
