<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Añadir</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="estilos.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
</head>
<body onload="clear2()">
	<div class="jumbotron">
		<h1>EXCEL</h1>
	</div>
	
	<a href="index.php" class="margenes"><button class="btn btn-success">ULTIMAS NOTICIAS</button></a><br><br><br>
	
	
	<?php
		include("configDB.php");
		$result = mysqli_query($conexion, "SELECT * FROM entradas");
		$array = array();
		if($result){
			while ($row = mysqli_fetch_array($result)) {
				$titulo = $row['Titulo'];
				array_push($array, $titulo);
			}
		}
	
	
		$consulta = "SELECT * FROM entradas ORDER BY Fecha desc";
		$respuesta = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
		$i=0;
		
		echo '<button class="btn btn-success" onclick="clear2()">Limpiar seleccion</button>';
		echo '<button class="btn btn-success" onclick="fill()">Seleccionar todos</button>';
				
		echo '<div class="marco-excel">';
		while ($columna = mysqli_fetch_array( $respuesta ) and $i<10)
		{
			echo '<div class="excel" id="n_'.$i.'"><input class="Check" type="checkbox" value='.$columna['ID'].'>'.
			$columna['Titulo']."</div><br>";
			
			$i++;
		}
		echo '</div><br><br>';
		
		
	?>
	<a class="margenes"><button class="btn btn-success" id="descargar" onclick="myFunction()">Descargar excel</button></a><br><br><br>
</body>

<script>

	function fill(){

		var checkBox = new Array();
		checkBox = document.getElementsByClassName("Check");
		var i;
		for(i=0;i<i<checkBox.length;i++){
		  checkBox[i].checked = true;
		}
	}
	
	function clear2(){
		var checkBox = new Array();
		checkBox = document.getElementsByClassName("Check");
		var i;
		for(i=0;i<i<checkBox.length;i++){
		  checkBox[i].checked = false;
		}
	}	
		
	function myFunction() {
		
		var checkBox = new Array();
		checkBox = document.getElementsByClassName("Check");
		
		var i;
		var index=0;
		var indice = new Array();
		
		for(i=0;i<checkBox.length;i++){
		  if (checkBox[i].checked == true && checkBox[i]!== 'undefined'){
			indice[index]=checkBox[i].value;
			index++;
		  } 
		};
		
		$( document ).ready(function() { 
			$("#descargar").load("descargarExl.php",{indice}); 
		}); 
		 
		clear2();
	}	
	 
	
</script>
</html>













