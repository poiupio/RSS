<?php
$usuario = "root";
$contrasena = "";
$servidor = "localhost";
$basededatos = "bd-rss";
$conexion = new mysqli($servidor, $usuario, $contrasena, $basededatos);
$conexion->set_charset("utf8");
?>