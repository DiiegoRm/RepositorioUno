<!DOCTYPE HTML>
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
						<?php
						include("mensaje.php");
						?>
						<header>
							<span class="avatar"><i class="fa fa-th-list fa-3x"></i></span>
							<h1>Consultar Tickets</h1>
						</header>

						<hr />
						<h2>Relacionados con el ticket</h2>
						<form method="post" action="restauranTicketRelationValidate.php">
							<div class="field">
								<input type="text" name="IdRestaurante" id="name" placeholder="Id Restaurante" />
                <br>
                <button type="submit" name="consultar">Consultar</button>
							</div>
						</form>
						<hr />
            <a href="eleccion.php"> <i class="fa fa-arrow-left fa-3x"></i></a>
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
