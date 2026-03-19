<?php
$host = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "cuatri8_bd1";

$conexion = mysqli_connect($host, $usuario, $password, $baseDatos);
if (!$conexion) {
    exit('Error al conectar a la base de datos');    
} 
?>