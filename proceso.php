<!DOCTYPE HTML>
<html>
	<head>
		<title>Menu</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<style>
			.with-nav-tabs.panel-primary .nav-tabs > li > a,
			.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
					color: #fff;
			}
			.with-nav-tabs.panel-primary .nav-tabs > .open > a,
			.with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
			.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
			.with-nav-tabs.panel-primhttps://s.bootsnipp.com/iframe/MaA0A#tab2primaryary .nav-tabs > li > a:focus {
				color: #fff;
				background-color: #3071a9;
				border-color: transparent;
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.active > a,
			.with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
				color: #428bca;
				background-color: #fff;
				border-color: #428bca;
				border-bottom-color: transparent;
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
					background-color: #428bca;
					border-color: #3071a9;
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
					color: #fff;   
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
					background-color: #3071a9;
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
					background-color: #4a9fe9;
			}
		</style>
	</head>
	<body>
		<?php
			include("conexion.php");/*llama a otra pagina*/
			session_start();
			if(isset($_SESSION["perfil"])){
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
								<h1>Mis Cursos <span class="pull-right label"><small><a href="index.php">salir</a></small></span></h1>
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
					/*Seleccionamos los cursos*/
					$query     = 'SELECT a.* FROM pro_curso a JOIN pro_detalle_curso b ON a.id = b.id_curso WHERE b.id_estudiante = '.$_SESSION["id"]; /*aqui se almacena la consulta en una variable*/
					$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
					$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
					$total     = $resultado->rowCount(); /*cuenta las filas*/
					?>
						<br>
						<div class="container">
							<div class="page-header">
									<h1>Mis Cursos<span class="pull-right label"><small><a href="index.php">salir</a></small></span></h1>
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
											<td><a href="listadoActividades2.php?id_curso=<?=$columnas['id']?>&id_estudiante=<?=$_SESSION["id"]?>">Ver detalle</a></td>
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
				case 3:
					/*Seleccionamos los cursos*/
					$query     = 'SELECT a.id, a.numero_doc, concat(a.nombre_uno, " ", a.apellido_uno) as nombre FROM pro_usuario a JOIN pro_relacion_parental b ON a.id = b.id_estudiante WHERE b.id_acudiente = '.$_SESSION["id"]; /*aqui se almacena la consulta en una variable*/
					$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
					$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
					$total     = $resultado->rowCount(); /*cuenta las filas*/
					?>
						<br>
						<div class="container">
							<div class="page-header">
									<h1>Control parental<span class="pull-right label"><small><a href="index.php">salir</a></small></span></h1>
							</div>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Documento</th>
										<th scope="col">Nombre</th>
										<th scope="col">Ver</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if($total>0){
										do{
										?>
										<tr>
											<td><?=$columnas['numero_doc']?></td>
											<td><?=$columnas['nombre']?></td>
											<td><a href="listadoCursos.php?id_estudiante=<?=$columnas["id"]?>">Ver detalle</a></td>
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
				case 4:
					?>
					<div class="container">
						<div class="page-header">
							<h1>Panel de Administración<span class="pull-right label label-default">:)</span> - <small><a href="index.php">salir</a></small></h1>
						</div>
						<div class="row">
							<div class="panel with-nav-tabs panel-primary">
								<div class="panel-heading">
									<ul class="nav nav-tabs">
										<li class="dropdown">
											<a href="#" data-toggle="dropdown">Profesores<span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#tab3primary" data-toggle="tab">Ingresar Profesor</a></li>
												<li><a href="#tab4primary" data-toggle="tab">Listado de Profesores</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="#" data-toggle="dropdown">Cursos<span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#tab1primary" data-toggle="tab">Ingresar Curso</a></li>
												<li><a href="#tab2primary" data-toggle="tab">Listado de curso</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="#" data-toggle="dropdown">Actividades<span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#tab5primary" data-toggle="tab">Ingresar Actividad</a></li>
												<li><a href="#tab6primary" data-toggle="tab">Listado de Actividades</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="#" data-toggle="dropdown">Estudiante<span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#tab7primary" data-toggle="tab">Ingresar Estudiante</a></li>
												<li><a href="#tab8primary" data-toggle="tab">Listado de Estudiantes</a></li>
												<li><a href="#tab9primary" data-toggle="tab">Asociar Estudiante-Curso</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="#" data-toggle="dropdown">Acudiente<span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#tab10primary" data-toggle="tab">Ingresar Acudiente</a></li>
												<li><a href="#tab11primary" data-toggle="tab">Listado de Acudientes</a></li>
												<li><a href="#tab12primary" data-toggle="tab">Asociar Estudiante-Acudiente</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="panel-body">
									<div class="tab-content">
										<div class="tab-pane fade in active" id="tab1primary">
											<div class="container">
												<div class="col-md-5">
													<div class="form-area">  
														<form role="form" action="guardarCurso.php">
															<br style="clear:both">
															<h3 style="margin-bottom: 25px; text-align: center;">Ingresar Curso</h3>
															<div class="form-group">
																<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
															</div>
															<div class="form-group">
																<select name="profesor" class="form-control" required = "required">
																	<option value="">Seleccion ...</option>
																	<?php
																	$query     = 'SELECT * FROM pro_usuario WHERE id_perfil = 1'; /*aqui se almacena la consulta en una variable*/
																	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
																	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
																	$total     = $resultado->rowCount(); /*cuenta las filas*/
																	if($total>0){
																		$i=1;
																		do{
																		?>
																			<option value="<?=$columnas['id']?>"><?=$columnas['nombre_uno']." ".$columnas['apellido_uno']?></option>
																		<?php
																		$i++;
																		}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
																	}
																	?>
																</select>
															</div>
													
															<button type="submit" class="btn btn-primary pull-right">Guardar</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!--**********************************************************************-->
										<div class="tab-pane fade" id="tab2primary">
											<div class="container">
												<div class="page-header">
														<h1>Listado de cursos:</h1>
												</div>
												<?php
													$query     = 'SELECT a.id, a.nombre, CONCAT(nombre_uno, " ", apellido_uno) as profesor FROM pro_curso a JOIN pro_usuario b ON a.id_profesor = b.id'; /*aqui se almacena la consulta en una variable*/
													$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
													$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
													$total     = $resultado->rowCount(); /*cuenta las filas*/	
												?>
												<table class="table">
													<thead>
														<tr>
															<th scope="col">Numero</th>
															<th scope="col">Curso</th>
															<th scope="col">Profesor Asignado</th>
															<th scope="col">Acci&oacute;n</th>	
														</tr>
													</thead>
													<tbody>
														<?php
														if($total>0){
															$i=1;
															do{
															?>
															<tr>
																<td><?=$i?></td>
																<td><?=$columnas['nombre']?></td>
																<td><?=$columnas['profesor']?></td>
																<td>
																	<a href="guardar.php?id_actividad=<?=$columnas["id"]?>&id_estudiante=<?=$_GET["id_estudiante"]?>" onclick="if($('#nota_<?=$columnas["id"]?>').val() != '')location.href=this.href+'&nota='+$('#nota_<?=$columnas["id"]?>').val();return false;">
																		Guadar
																	</a>
																</td>
															</tr>
															<?php
															$i++;
															}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
														}else{
															?>
																<tr>
																	<td colspan="3">Sin registro de notas</td>
																</tr>
															<?php
														}
														?>
													</tbody>
												</table>
											</div>
										</div>
										<!--**********************************************************************-->
										<div class="tab-pane fade" id="tab3primary">
											<div class="container">
												<div class="col-md-5">
													<div class="form-area">  
														<form role="form" action="guardarUsuario.php">
															<br style="clear:both">
															<h3 style="margin-bottom: 25px; text-align: center;">Ingresar Profesor</h3>
															<div class="form-group">
																<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="name2" name="name2" placeholder="Segundo Nombre">
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido">
															</div>
															<div class="form-group">
																<input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required>
															</div>
															<div class="form-group">
																<select name="tipo" class="form-control" required = "required">
																	<option value="">Seleccione ...</option>
																	<?php
																	$query     = 'SELECT * FROM pro_documento'; /*aqui se almacena la consulta en una variable*/
																	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
																	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
																	$total     = $resultado->rowCount(); /*cuenta las filas*/
																	if($total>0){
																		$i=1;
																		do{
																		?>
																			<option value="<?=$columnas['id']?>"><?=$columnas['nombre']?></option>
																		<?php
																		$i++;
																		}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
																	}
																	?>
																</select>
															</div>
															<div class="form-group">
																<input type="number" class="form-control" id="documento" name="documento" placeholder="Documento" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
															</div>
															<div class="form-group">
																<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
																<input type="hidden" class="form-control" id="perfil" name="perfil" value="1" required>
															</div>
															<button type="submit" class="btn btn-primary pull-right">Guardar</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!--**********************************************************************-->
										<div class="tab-pane fade" id="tab4primary">
											<div class="container">
												<div class="page-header">
														<h1>Listado de Profesores:</h1>
												</div>
												<?php
													$query     = 'SELECT numero_doc, CONCAT(nombre_uno, " ", apellido_uno) as nombre, direccion, telefono FROM pro_usuario where id_perfil = 1'; /*aqui se almacena la consulta en una variable*/
													$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
													$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
													$total     = $resultado->rowCount(); /*cuenta las filas*/	
												?>
												<table class="table">
													<thead>
														<tr>
															<th scope="col">Documento</th>
															<th scope="col">Nombre</th>
															<th scope="col">Direccion</th>
															<th scope="col">Telefono</th>	
														</tr>
													</thead>
													<tbody>
														<?php
														if($total>0){
															$i=1;
															do{
															?>
															<tr>
																<td><?=$columnas['numero_doc']?></td>
																<td><?=$columnas['nombre']?></td>
																<td><?=$columnas['direccion']?></td>
																<td><?=$columnas['telefono']?></td>
															</tr>
															<?php
															$i++;
															}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
														}else{
															?>
																<tr>
																	<td colspan="3">Sin registro de notas</td>
																</tr>
															<?php
														}
														?>
													</tbody>
												</table>
											</div>
										</div>
										<!--**********************************************************************-->
										<div class="tab-pane fade" id="tab5primary">
											<div class="container">
												<div class="col-md-5">
													<div class="form-area">  
														<form role="form" action="guardarActividad.php">
															<br style="clear:both">
															<h3 style="margin-bottom: 25px; text-align: center;">Ingresar Actividad</h3>
															<div class="form-group">
																<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
															</div>
															<div class="form-group">
																<select name="curso" class="form-control" required = "required">
																	<option value="">Seleccion ...</option>
																	<?php
																	$query     = 'SELECT * FROM pro_curso'; /*aqui se almacena la consulta en una variable*/
																	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
																	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
																	$total     = $resultado->rowCount(); /*cuenta las filas*/
																	if($total>0){
																		$i=1;
																		do{
																		?>
																			<option value="<?=$columnas['id']?>"><?=$columnas['nombre']?></option>
																		<?php
																		$i++;
																		}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
																	}
																	?>
																</select>
															</div>
													
															<button type="submit" class="btn btn-primary pull-right">Guardar</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!--**********************************************************************-->
										<div class="tab-pane fade" id="tab6primary">
										<div class="container">
												<div class="page-header">
														<h1>Listado de Actividades:</h1>
												</div>
												<?php
													$query     = 'SELECT a.id, a.nombre, b.nombre as curso FROM pro_actividad a JOIN pro_curso b ON a.id_curso = b.id'; /*aqui se almacena la consulta en una variable*/
													$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
													$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
													$total     = $resultado->rowCount(); /*cuenta las filas*/	
												?>
												<table class="table">
													<thead>
														<tr>
															<th scope="col">Numero</th>
															<th scope="col">Nombre</th>
															<th scope="col">curso</th>
														</tr>
													</thead>
													<tbody>
														<?php
														if($total>0){
															$i=1;
															do{
															?>
															<tr>
																<td><?=$i?></td>
																<td><?=$columnas['nombre']?></td>
																<td><?=$columnas['curso']?></td>
															</tr>
															<?php
															$i++;
															}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
														}else{
															?>
																<tr>
																	<td colspan="3">Sin registro de notas</td>
																</tr>
															<?php
														}
														?>
													</tbody>
												</table>
											</div>
										</div>
										<!--**********************************************************************-->
										<div class="tab-pane fade" id="tab7primary">
											<div class="container">
												<div class="col-md-5">
													<div class="form-area">  
														<form role="form" action="guardarUsuario.php">
															<br style="clear:both">
															<h3 style="margin-bottom: 25px; text-align: center;">Ingresar Estudiante</h3>
															<div class="form-group">
																<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="name2" name="name2" placeholder="Segundo Nombre">
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido">
															</div>
															<div class="form-group">
																<input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion" required>
															</div>
															<div class="form-group">
																<select name="tipo" class="form-control" required = "required">
																	<option value="">Seleccione ...</option>
																	<?php
																	$query     = 'SELECT * FROM pro_documento'; /*aqui se almacena la consulta en una variable*/
																	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
																	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
																	$total     = $resultado->rowCount(); /*cuenta las filas*/
																	if($total>0){
																		$i=1;
																		do{
																		?>
																			<option value="<?=$columnas['id']?>"><?=$columnas['nombre']?></option>
																		<?php
																		$i++;
																		}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
																	}
																	?>
																</select>
															</div>
															<div class="form-group">
																<input type="number" class="form-control" id="documento" name="documento" placeholder="Documento" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
															</div>
															<div class="form-group">
																<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
																<input type="hidden" class="form-control" id="perfil" name="perfil" value="2" required>
															</div>
															<button type="submit" class="btn btn-primary pull-right">Guardar</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!--**********************************************************************-->
										<div class="tab-pane fade" id="tab8primary">
											<div class="container">
												<div class="page-header">
														<h1>Listado de Estudiantes:</h1>
												</div>
												<?php
													$query     = 'SELECT numero_doc, CONCAT(nombre_uno, " ", apellido_uno) as nombre, direccion, telefono FROM pro_usuario where id_perfil = 2'; /*aqui se almacena la consulta en una variable*/
													$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
													$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
													$total     = $resultado->rowCount(); /*cuenta las filas*/	
												?>
												<table class="table">
													<thead>
														<tr>
															<th scope="col">Documento</th>
															<th scope="col">Nombre</th>
															<th scope="col">Direccion</th>
															<th scope="col">Telefono</th>	
														</tr>
													</thead>
													<tbody>
														<?php
														if($total>0){
															$i=1;
															do{
															?>
															<tr>
																<td><?=$columnas['numero_doc']?></td>
																<td><?=$columnas['nombre']?></td>
																<td><?=$columnas['direccion']?></td>
																<td><?=$columnas['telefono']?></td>
															</tr>
															<?php
															$i++;
															}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
														}else{
															?>
																<tr>
																	<td colspan="3">Sin registro de notas</td>
																</tr>
															<?php
														}
														?>
													</tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane fade" id="tab9primary">
											<div class="container">
												<div class="col-md-5">
													<div class="form-area">  
														<form role="form" action="guardarAsociacion.php">
															<br style="clear:both">
															<h3 style="margin-bottom: 25px; text-align: center;">Registro</h3>
															<div class="form-group">
																<select name="tipo" class="form-control" required = "required">
																	<option value="">Seleccione Curso ...</option>
																	<?php
																	$query     = 'SELECT * FROM pro_curso'; /*aqui se almacena la consulta en una variable*/
																	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
																	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
																	$total     = $resultado->rowCount(); /*cuenta las filas*/
																	if($total>0){
																		$i=1;
																		do{
																		?>
																			<option value="<?=$columnas['id']?>"><?=$columnas['nombre']?></option>
																		<?php
																		$i++;
																		}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
																	}
																	?>
																</select>
															</div>
															<div class="form-group">
																<select name="tipo2" class="form-control" required = "required">
																	<option value="">Seleccione Estudiante ...</option>
																	<?php
																	$query     = 'SELECT * FROM pro_usuario WHERE id_perfil = 2'; /*aqui se almacena la consulta en una variable*/
																	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
																	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
																	$total     = $resultado->rowCount(); /*cuenta las filas*/
																	if($total>0){
																		$i=1;
																		do{
																		?>
																			<option value="<?=$columnas['id']?>"><?=$columnas['nombre_uno']." ".$columnas['apellido_uno']?></option>
																		<?php
																		$i++;
																		}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
																	}
																	?>
																</select>
															</div>
															<button type="submit" class="btn btn-primary pull-right">Guardar</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!--**********************************************************************-->
										<div class="tab-pane fade" id="tab10primary">
											<div class="container">
												<div class="col-md-5">
													<div class="form-area">  
														<form role="form" action="guardarUsuario.php">
															<br style="clear:both">
															<h3 style="margin-bottom: 25px; text-align: center;">Ingresar Acudiente</h3>
															<div class="form-group">
																<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="name2" name="name2" placeholder="Segundo Nombre">
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido">
															</div>
															<div class="form-group">
																<input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion" required>
															</div>
															<div class="form-group">
																<select name="tipo" class="form-control" required = "required">
																	<option value="">Seleccione ...</option>
																	<?php
																	$query     = 'SELECT * FROM pro_documento'; /*aqui se almacena la consulta en una variable*/
																	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
																	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
																	$total     = $resultado->rowCount(); /*cuenta las filas*/
																	if($total>0){
																		$i=1;
																		do{
																		?>
																			<option value="<?=$columnas['id']?>"><?=$columnas['nombre']?></option>
																		<?php
																		$i++;
																		}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
																	}
																	?>
																</select>
															</div>
															<div class="form-group">
																<input type="number" class="form-control" id="documento" name="documento" placeholder="Documento" required>
															</div>
															<div class="form-group">
																<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
															</div>
															<div class="form-group">
																<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
																<input type="hidden" class="form-control" id="perfil" name="perfil" value="3" required>
															</div>
															<button type="submit" class="btn btn-primary pull-right">Guardar</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!--**********************************************************************-->
										<div class="tab-pane fade" id="tab11primary">
											<div class="container">
												<div class="page-header">
														<h1>Listado de Acudientes:</h1>
												</div>
												<?php
													$query     = 'SELECT numero_doc, CONCAT(nombre_uno, " ", apellido_uno) as nombre, direccion, telefono FROM pro_usuario where id_perfil = 3'; /*aqui se almacena la consulta en una variable*/
													$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
													$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
													$total     = $resultado->rowCount(); /*cuenta las filas*/	
												?>
												<table class="table">
													<thead>
														<tr>
															<th scope="col">Documento</th>
															<th scope="col">Nombre</th>
															<th scope="col">Direccion</th>
															<th scope="col">Telefono</th>	
														</tr>
													</thead>
													<tbody>
														<?php
														if($total>0){
															$i=1;
															do{
															?>
															<tr>
																<td><?=$columnas['numero_doc']?></td>
																<td><?=$columnas['nombre']?></td>
																<td><?=$columnas['direccion']?></td>
																<td><?=$columnas['telefono']?></td>
															</tr>
															<?php
															$i++;
															}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
														}else{
															?>
																<tr>
																	<td colspan="3">Sin registro de notas</td>
																</tr>
															<?php
														}
														?>
													</tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane fade" id="tab12primary">
											<div class="container">
												<div class="col-md-5">
													<div class="form-area">  
														<form role="form" action="guardarAsociacion2.php">
															<br style="clear:both">
															<h3 style="margin-bottom: 25px; text-align: center;">Registro</h3>
															<div class="form-group">
																<select name="tipo" class="form-control" required = "required">
																	<option value="">Seleccione Acudiente ...</option>
																	<?php
																	$query     = 'SELECT id, CONCAT(nombre_uno, " ", apellido_uno) as nombre FROM pro_usuario where id_perfil = 3'; /*aqui se almacena la consulta en una variable*/
																	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
																	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
																	$total     = $resultado->rowCount(); /*cuenta las filas*/
																	if($total>0){
																		$i=1;
																		do{
																		?>
																			<option value="<?=$columnas['id']?>"><?=$columnas['nombre']?></option>
																		<?php
																		$i++;
																		}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
																	}
																	?>
																</select>
															</div>
															<div class="form-group">
																<select name="tipo2" class="form-control" required = "required">
																	<option value="">Seleccione Estudiante ...</option>
																	<?php
																	$query     = 'SELECT * FROM pro_usuario WHERE id_perfil = 2'; /*aqui se almacena la consulta en una variable*/
																	$resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
																	$columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
																	$total     = $resultado->rowCount(); /*cuenta las filas*/
																	if($total>0){
																		$i=1;
																		do{
																		?>
																			<option value="<?=$columnas['id']?>"><?=$columnas['nombre_uno']." ".$columnas['apellido_uno']?></option>
																		<?php
																		$i++;
																		}while($columnas = $resultado->fetch(PDO::FETCH_ASSOC));
																	}
																	?>
																</select>
															</div>
															<button type="submit" class="btn btn-primary pull-right">Guardar</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						break;
				default:
					echo "ocurrio un problema al cargar el perfil";
					break;
			}
		}else{
			echo "error sin sesion";
		}
		?>
	</body>
</html>

