<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Menu</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			include("conexion.php");/*llama a otra pagina*/
			session_start();
			switch ($_SESSION["perfil"]) {
				case 1:
						/*Seleccionamos los cursos*/
						$query     = 'SELECT * FROM pro_curso WHERE id_profesor = '.$_SESSION["id"]; /*aqui se almacena la consulta en una variable*/
						$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
						$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
						$total     = $resultado->rowCount(); /*cuenta las filas*/
						?>
							<br>
							<div class="container">
								<div class="page-header">
										<h1>Mis Cursos<span class="pull-right label label-default"><?=$total?></span></h1>
								</div>
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Numero Curso</th>
											<th scope="col">Nombre curso</th>
											<th scope="col">Ver</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if($total>0){
											do{
											?>
											<tr>
												<td><?=$columnas['id']?></td>
												<td><?=$columnas['nombre']?></td>
												<td><a href="listadoEstudiantes.php?id=<?=$columnas['id']?>&nombre_curso=<?=$columnas['nombre']?>">Ver detalle</a></td>
											</tr>
											<?php
											}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
										}else{
											?>
												<tr>
													<td colspan="3">Sin registro de cursos</td>
												</tr>
											<?php
										}
										?>
									</tbody>
								</table>
							</div>
						<?php
						break;
				case 2:
						echo "udted es estudiante";
						break;
				case 3:
						echo "ud es acudkiente";
						break;
				case 3:
						echo "ud es adminitrativo";
						break;
		}
		?>
	</body>
</html>

