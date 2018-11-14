<?php
include("conexion.php");

$id_actividad = $_GET["id_actividad"];
$id_estudiante = $_GET["id_estudiante"];
$nota = $_GET["nota"];

$query     = 'SELECT a.id, c.id AS id_curso FROM pro_nota a JOIN pro_actividad b ON a.id_actividad = b.id JOIN pro_curso c ON b.id_curso = c.id  WHERE a.id_actividad= "'.$id_actividad.'" AND a.id_estudiante="'.$id_estudiante.'"';
$resultado = $conexion->query($query);
$columnas  = $resultado->fetch(PDO::FETCH_ASSOC);
$total     = $resultado->rowCount();

if($total==1){
	$updateExchange = 'UPDATE pro_nota SET nota = '.$nota.' WHERE id = '.$columnas['id'];
    $resultadoInsert = $conexion->exec($updateExchange);

    if ($resultadoInsert === False){
        header("Location: listadoActividades.php?mensaje=5");
      	exit();
    }else{
         header("Location: listadoActividades.php?id_curso=".$columnas['id_curso']."&id_estudiante=".$id_estudiante);
  	     exit();
    }
}else{
	$insertExchange = 'INSERT INTO pro_nota VALUES(null, '.$id_actividad.', "'.$id_estudiante.'", '.$nota.')';
    $resultadoInsert = $conexion->exec($insertExchange);

    if ($resultadoInsert === False){
        header("Location: listadoActividades.php?mensaje=5");
      	exit();
    }else{
		var_dump($columnas);die();
		header("Location: listadoActividades.php?id_curso=".$columnas['id_curso']."&id_estudiante=".$id_estudiante);
  	    exit();
    }
}
?>
