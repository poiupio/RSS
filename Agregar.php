<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Añadir</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
	<div class="jumbotron">
		<h1>BIENVENIDO :3</h1>
	</div>
	
	<div class="jumbotron" id="margen">
    <form action="guardar.php" method="post" class="forma">
        <p>Introduzca la dirección del archivo xml a guardar:</p>
		
		<br>
		
		<input type="text" name="urlXml">
		<input type="submit" value="Agregar">
    </form>
	</div>
	
	<br>
	<br>
	
	<a href="index.php" class="margenes"><button class="btn btn-success">ULTIMAS NOTICIAS</button></a>
	
</body>
</html>