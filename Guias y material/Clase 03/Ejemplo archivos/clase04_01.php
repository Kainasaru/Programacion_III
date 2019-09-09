<?php
	$path = $_GET["path"];
	//$path = "test.php";
	//$path = "upload.php";
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="./img/utnLogo.png" rel="icon" type="image/png" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="estilo.css">
		<link rel="stylesheet" type="text/css" href="animacion.css">
	
		<title>Subir archivos con PHP</title>
	</head>
	<body>
	<div class="container">
		<div class="page-header">
			<h1>Subir un archivo</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight" >
			<h1>Ejemplo</h1>
			<table style="width:100%">
				<tbody>
					<tr>
						<td width="70%">
							<div id="divFrm" style="height:350px;overflow:auto;margin-top:20px">
								<form action="<?php echo $path; ?>" method="post" enctype="multipart/form-data" >
									<input type="file" name="archivo"  class="MiBotonUTN" /> 
									<br/>
									<input type="submit" class="MiBotonUTN" value="Subir" />
								</form>
							</div>
						</td>
						<td style="padding-left:3%">
							<ul style="list-style-type:disc">
								<li>Form</li>
								<li>method => post </li>
								<li>enctype => multipart/form-data </li>
							</ul>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<a href="./index.html" class="btn btn-info" >Volver al Inicio</a>
	</div>
								
	</body>
</html>