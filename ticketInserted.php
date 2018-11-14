<?php
$nombreRestaurante = $_GET['name'];
$nombreMaitre = $_GET['nameMaitre'];
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
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><i class="fa fa-smile-o fa-5x"></i></span>
							<h1>Felicidades!!!</h1>
              <p>Ticket Insertado<p>
						</header>
					<hr />
						Restaurante: <h1 class="text-info"><?php echo $nombreRestaurante; ?></h1>
            <br>
						<?php  if($nombreMaitre != ""){?>
            Maître: <h1 class="text-success"><?php echo $nombreMaitre; ?></h1>
						<?php }else{ ?>
							<spam class="text-warning">Lo sentimos, el Restaurante no cuenta con Maître</spam>
							<?php } ?>
						<hr />
            <a href="eleccion.php"><button type="button" name="btn btn-primary">Regresar</button></a>

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
