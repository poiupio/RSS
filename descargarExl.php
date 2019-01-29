<?php
include("configDB.php");

$indices = $_REQUEST['indice']; 

$consulta = "SELECT * FROM entradas ORDER BY Fecha desc";
$respuesta = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
$i=0;


?>