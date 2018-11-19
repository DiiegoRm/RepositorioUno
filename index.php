
<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<?php 
			session_start();
			unset($_SESSION["id"]);
			unset($_SESSION["perfil"]);
			session_destroy();
		?>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<style>
			body {
				background-color: white;
			}

			#loginbox {
				margin-top: 30px;
			}

			#loginbox > div:first-child {        
				padding-bottom: 10px;    
			}

			.iconmelon {
				display: block;
				margin: auto;
			}

			#form > div {
				margin-bottom: 25px;
			}

			#form > div:last-child {
				margin-top: 10px;
				margin-bottom: 10px;
			}

			.panel {    
				background-color: transparent;
			}

			.panel-body {
				padding-top: 30px;
				background-color: rgba(2555,255,255,.3);
			}

			#particles {
				width: 100%;
				height: 100%;
				overflow: hidden;
				top: 0;                        
				bottom: 0;
				left: 0;
				right: 0;
				position: absolute;
				z-index: -2;
			}

			.iconmelon,
			.im {
			position: relative;
			width: 300px;
			height: 187px;
			display: block;
			fill: #525151;
			}

			.iconmelon:after,
			.im:after {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<?php 
				include("mensaje.php");
			?>
			<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
				<div class="row">                
					<div class="iconmelon">
						<img src="images/logo.png" height="187" width="300"> 
					</div>
				</div>
				
				<div class="panel panel-default" >
					<div class="panel-heading">
						<div class="panel-title text-center"><strong>Inicio de Sesion</strong></div>
					</div>     
		
					<div class="panel-body" >
		
					<form action="validar.php" method="post" autocomplete="off">
						<!---->
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre Usuario" required=""/>                                        
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" required=""/>
						</div>                                                                  
						<br>
						<div class="form-group">
							<!-- Button -->
							<div class="col-sm-12 controls">
								<button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>                          
							</div>
						</div>
						<!---->
					</form>     
		
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>
