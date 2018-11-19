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
            $query     = 'SELECT a.id, a.nombre, IF(b.nota is null, "0", b.nota) as nota, c.nombre as curso FROM pro_actividad a JOIN pro_curso c ON a.id_curso = c.id AND c.id = '.$_GET["id_curso"].' LEFT JOIN pro_nota b ON a.id = b.id_actividad AND b.id_estudiante = '.$_GET["id_estudiante"]; /*aqui se almacena la consulta en una variable*/
            $resultado = $conexion->query($query); /*con esta linea se ejecuta el query*/
            $columnas  = $resultado->fetch(PDO::FETCH_ASSOC); /*guardo el resultado de la consulta fecht trae el siguiente registro*/
            $total     = $resultado->rowCount(); /*cuenta las filas*/
        ?>
        <br>
        <div class="container">
            <div class="page-header">
                    <h1>Notas: <span class="pull-right label"><small><a href="listadoCursos.php?id_estudiante=<?=$_GET["id_estudiante"]?>">Atras</a></small> - <small><a href="index.php">Salir</a></small></span></h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Actividades</th>
                        <th scope="col">Nota</th>
                        
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
                            <td><?=$columnas["nota"]?></td>
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
	</body>
</html>

