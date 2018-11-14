<?php
include("conexion.php");
$noMaitre 			= 0;
$idRestaurant 	= $_GET['IdRestaurante'];
$query     			= 'SELECT RESTAURANT.NAME, SPECIALTY.DESCRIPTION, PERSON.NAME, PERSON.SURNAME FROM RESTAURANT INNER JOIN WAITER INNER JOIN SPECIALTY INNER JOIN PERSON WHERE RESTAURANT.ID = '.$idRestaurant.' AND RESTAURANT.IDSPECIALTY = SPECIALTY.IDSPECIALTY AND RESTAURANT.ID = WAITER.RESTCONTR AND WAITER.NIF = PERSON.NIF ORDER BY RAND() LIMIT 1';
$resultado 			= $conexion->query($query);
$columnas  			= $resultado->fetch(PDO::FETCH_ASSOC);

if ($columnas['NAME'] == ""){
		$noMaitre 	= 1;
		$query			= 'SELECT RESTAURANT.NAME, SPECIALTY.DESCRIPTION  FROM RESTAURANT INNER JOIN SPECIALTY WHERE RESTAURANT.ID = 1493 AND RESTAURANT.IDSPECIALTY = SPECIALTY.IDSPECIALTY';
		$resultado  = $conexion->query($query);
		$columnas   = $resultado->fetch(PDO::FETCH_ASSOC);
}

$queryTickets			= 'SELECT COUNT(exchangedticket.idChange) AS CUENTA , exchangedticket.ticket AS TICKET, SUM(restaurant.menuPrice) AS TOTAL FROM exchangedticket INNER JOIN restaurant WHERE exchangedticket.restaurant = restaurant.id AND restaurant.id= '.$idRestaurant.' GROUP BY exchangedticket.ticket;';
$resultadoTickets = $conexion->query($queryTickets);
$columnasTickets	= $resultadoTickets->fetch(PDO::FETCH_ASSOC);

$queryPrecio = 'SELECT COUNT(exchangedticket.idChange) AS TOTAL_TICKETS, SUM(restaurant.menuPrice) AS PRECIO_TICKETS FROM exchangedticket INNER JOIN restaurant WHERE exchangedticket.restaurant = restaurant.id AND restaurant.id='.$idRestaurant;
$resultadoPrecio = $conexion->query($queryPrecio);
$columnasPrecio	= $resultadoPrecio->fetch(PDO::FETCH_ASSOC);
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
						<div class="container-fluid">
							<header class="col-md-12 col-xs-12">
								<span class="avatar"><i class="fa fa-bookmark fa-3x"></i></span>
								<h1>Restaurante Ticket</h1>
								<p>Tickets Relacionados a: <?php echo $columnas['NAME'] ?></p>
							</header>
						</div>

						<hr />

            <p><b>Nombre de Restaurante: </b><?php echo $columnas['NAME'] ?>.</p>
            <p><b>Especialidad: </b><?php echo $columnas['DESCRIPTION'] ?>.</p>
            <?php if ($noMaitre == 0){?>
						<p><b>Nombre Maître: </b><?php echo $columnas['SURNAME'] ?>.</p>
						<?php }else{ echo "<p><b>El restaurante no cuenta con Maître.</p>";}?>
            <div class="field col-md-8">
            <table class="table-hover table-bordered" border="1">
              <tr class="nth-child">
                <td ><strong>Num</strong> </td>
                <td><strong>Ticket </strong></td>
                <td>Amount </td>
              </tr>
							<?php do{?>
								<tr>
	                <td><?php echo $columnasTickets['CUENTA'] ?></td>
	                <td><?php echo $columnasTickets['TICKET'] ?></td>
	                <td><?php echo $columnasTickets['TOTAL'] ?></td>
	              </tr>

							 <?php  }while($columnasTickets = $resultadoTickets->fetch(PDO::FETCH_ASSOC))?>

            </table>
						</div>
						<hr />
						Total Tickets:<br> <strong>	<?php echo $columnasPrecio['TOTAL_TICKETS']; ?></strong>
						<br>
						Tickets Ammount: <br>$<?php echo $columnasPrecio['PRECIO_TICKETS'];?>

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
