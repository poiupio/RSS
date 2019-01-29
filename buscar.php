<?php 
if(!isset($_SESSION)){ 
    session_start(); 
}
//Variable que contendrá el resultado de la búsqueda
$texto = '';
//Variable que contendrá el número de resgistros encontrados
$registros = '';

	echo '<head>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width">
		  <title>ADMINISTRADOR</title>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		  <link rel="stylesheet" href="estilos.css">
		</head>';
if($_POST){
	
  $busqueda = trim($_POST['palabra']);

  $entero = 0;
  
  if (empty($busqueda)){
	  $texto = 'Búsqueda sin resultados';
  }else{
	  // Si hay información para buscar, abrimos la conexión
	  //cadena de conexion 
    include("configDB.php");
	  
	  //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
	  $sql = "SELECT * FROM entradas WHERE Titulo LIKE '%" .$busqueda. "%' or Descripcion LIKE '%" .$busqueda. "%'  or Autor LIKE '%" .$busqueda. "%' ORDER BY Fecha desc LIMIT 10";
	  
	  $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
      //Si hay resultados...
	  if (@mysqli_num_rows($resultado) > 0){ 
	     // Se recoge el número de resultados
		 $registros = '<br><br><p><h1 class="titulo">HEMOS ENCONTRADO ' . mysqli_num_rows($resultado) . ' registros </h1></p><br><br>';
	     // Se almacenan las cadenas de resultado
		 while($fila = mysqli_fetch_assoc($resultado)){ 
              $texto .= '<div class="jumbotron noticia"><h3>'.$fila['Titulo'] . "</h3><hr>". $fila['Descripcion'] . "<br><br>" . $fila['Fecha']  ." - ". $fila['Autor'] . "<br>" . "</div>	<br/><br/>";
			 }
	  
	  }else{
			   $texto = '<div class="jumbotron"><h4>NO HAY RESULTADOS EN LA BBDD</h4></div>';	
	  }
	  // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
	  mysqli_close($conexion);
  }
  echo $registros . "<br/>" . $texto;
  echo '<br><br><a href="index.php" class="margenes"><button class="btn btn-success">REGRESAR</button></a><br><br>';
}
?>