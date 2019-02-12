<?php
include("configDB.php");

$tabla='<html><body>';
$tabla.='<table><tr>';

$indices=$_GET["indice"];
$noticias[]=null;
$j=0;

foreach ($indices as $val){ 
	
    $consulta = "SELECT * FROM entradas WHERE ID=".$val;
	$respuesta = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	while ($columna = mysqli_fetch_array( $respuesta )){
		for($i=0;$i<5;$i++){
			$noticias[$j]=$columna[$i];
			$j++;
		}
		
    }
} 
	$salto=1;
	if(!empty($noticias)) {
		
		foreach($noticias as $noticia) {
		
		if($salto<5){
			$tabla.='<td>'.$noticia.'</td>';
			$salto++;
		}else{
			$tabla.='<td>'.$noticia.'</td></tr><tr></tr><tr>';
			$salto=1;
		}	
			
		}
		$tabla.='</tr></table>';
		$tabla.='</body></html>';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Transfer-Encoding: binary');
		print $tabla;
		
		
	}else{
		echo 'No hay datos a exportar';
	}
	exit;
	
?>













