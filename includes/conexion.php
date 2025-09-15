<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "envios";

$conexion = new mysqli($servidor, $usuario, $clave, $bd);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>