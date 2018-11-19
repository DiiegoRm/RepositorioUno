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
            $query     = 'SELECT b.id,  CONCAT(b.nombre_uno, " ", b.apellido_uno) as nombre FROM pro_detalle_curso a JOIN pro_usuario b ON a.id_estudiante = b.id WHERE id_curso = '.$_GET["id"]; /*aqui se almacena la consulta en una variable*/
            $resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
            $columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
            $total     = $resultado->rowCount(); /*cuenta las filas*/
        ?>
        <br>
        <div class="container">
            <div class="page-header">
                <h1>Listado : <?=$_GET['nombre_curso']?><span class="pull-right label"><small><a href="proceso.php">Atras</a></small> - <small><a href="index.php">Salir</a></small></span></h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Nombre del Estudiante</th>
                        <th scope="col">Ver</th>
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
                            <td><a href="listadoActividades.php?id_curso=<?=$_GET["id"]?>&id_estudiante=<?=$columnas["id"]?>">Ver detalle</a></td>
                        </tr>
                        <?php
                        $i++;
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
	</body>
</html>

