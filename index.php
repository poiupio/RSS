<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Inicio</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="estilos.css">
	<script type="text/javascript" src="jquery-1.12.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui.css">
	<script type="text/javascript" src="jquery-ui.js"></script>
	<script type="text/javascript" src="autocomplete.js"></script>
	</head>
<body>

	<div class="header">
		<ul class="nav">
			<li><a>Menu</a>
				<ul>
					<li><a href="agregar.php">Agregar XML</a></li>
					<li><a href="excel.php">Excel</a></li>
				</ul>
			</li>
			<li><a>Ordenar</a>
				<ul>
					<li><a id="sortFecha">Fecha</a></li>
					<li><a id="sortTitulo">Titulo</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="jumbotron">
		<h1>BIENVENIDO :3</h1>
	</div>
	<div class="jumbotron" id="margen">
	<form action="buscar.php" method="post">
		<p>Introduzca su búsqueda:   
			<input type="text" name="palabra" id="busqueda">
		</p>
		<h2 id="nombre"></h2>
		<img src="" id="avatar">
		<input class="btn btn-success" type="submit" value="Buscar">
	</form>
	</div>
	<br>
	<br>
	<div id="noticias">
	
	</div>
	
	<script>
	window.onload = function() {
	document.getElementById("noticias").innerHTML = '<?php echo imprimir("ORDER BY Fecha desc") ?>';
		
	
	document.getElementById("sortTitulo").addEventListener("click", function(){
		document.getElementById("noticias").innerHTML = '<?php imprimir("ORDER BY Titulo desc") ?>';
	});
	document.getElementById("sortFecha").addEventListener("click", function(){
		document.getElementById("noticias").innerHTML = '<?php imprimir("ORDER BY Fecha desc") ?>';
	});
	}
	
	$(document).ready(function () {
		
		
		var items = json_encode($array);
		$("#busqueda").autocomplete({
			source: items,
		});
	});
	
	</script>

<?php

function imprimir($parametros){
	include("configDB.php");
	$result = mysqli_query($conexion, "SELECT * FROM entradas");
	$array = array();
	if($result){
		while ($row = mysqli_fetch_array($result)) {
			$titulo = $row['Titulo'];
			array_push($array, $titulo);
		}
	}
	
	
	$consulta = 'SELECT * FROM entradas '.$parametros;
    $respuesta = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    $i=0;
	
	while ($columna = mysqli_fetch_array( $respuesta ) and $i<10)
    {
        echo '<div class="jumbotron noticia"><h3>'.$columna['Titulo'] . "</h3><hr>" . $columna['Descripcion'] . "<br><br>".$columna['Fecha'].
		"</div><br/><br/>";
        $i++;
    }
	
}
?> 
