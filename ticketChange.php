<?php
	include("conexion.php"); /*llama a otra pagina*/

	$query     = 'SELECT denomination FROM ticket'; /*aqui se almacena la consulta en una variable*/
	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
	$total     = $resultado->rowCount(); /*cuenta las filas*/
	/*do{
		echo $columnas['denomination'];

	}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC))
	*/

?>
<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Identity by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">

						<header>
							<?php
							include("mensaje.php");
							?>
							<span class="avatar"><i class="fa fa-hand-o-up fa-3x fa-fw"></i></span>
							<h1>Insertar Ticket</h1>
						</header>

						<hr />
						<form action="query.php" method="post" autocomplete="off">
							<div class="field">
								<div class="select-wrapper">
									<select name="ticketType" id="ticketType">
										<option value="0" selected>--Selccione un ticket--</option>
										<?php do{?>
										<option value="<?=$columnas['denomination']?>"><?php	echo trim($columnas['denomination']);?></option>
										 <?php  }while($columnas = $resultado->fetch(PDO::FETCH_ASSOC))?>
									</select>
									<br>
									<input type="text" name="idRestaurante"  placeholder="Id restaurante">
								</div>
							</div>
							<ul class="actions">
								<li><button type="submit" name="Enviar">Aceptar</button></li>
							</ul>
						</form>
						<hr />
						<a href="eleccion.php"> <i class="fa fa-arrow-left fa-4x"></i></a>
					</section>
			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>
