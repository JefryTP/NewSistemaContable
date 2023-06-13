<?php
$host = 'localhost';
$user = 'root';
$pass = '';

$bd = 'bd_contable';
/*
try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd;", $user, $pass);
} catch (PDOException $e) {
    die('Conected failed: ' . $e->getMessage());
}*/

$conexion = mysqli_connect($host, $user, $pass, $bd);

if (!$conexion) {
    die('Error al conectar con la base de datos: ' . mysqli_connect_error());
}
