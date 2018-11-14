
<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<!--<link rel="stylesheet" href="assets/css/main.css" />-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
							<!--<span class="avatar"><img src="images/avatar.jpg" alt="" /></span>-->
							<h1>Tickets Restaurante</h1>
							<p>Inicie sesion para los tickets</p>
						</header>

						<hr />
						<form action="validar.php" method="post" autocomplete="off">
							<div class="field">
								<input type="text" name="usuario" id="usuario" placeholder="Nombre Usuario" required=""/>
							</div>
							<div class="field">
								<input type="password" name="clave" id="clave" placeholder="Contraseña" required=""/>
							</div>
							<ul class="actions">
								<li><button type="submit" name="enviar" class="button">Entrar</button></li>
							</ul>
						</form>
						<hr />
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
