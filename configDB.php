<?php
$usuario = "root";
$contrasena = "your_password";
$servidor = "localhost";
$basededatos = "bd-rss";
$conexion = new mysqli($servidor, $usuario, "", $basededatos);
$conexion->set_charset("utf8");
?>