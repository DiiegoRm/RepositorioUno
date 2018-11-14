<?php
include("conexion.php");


$ticketType    = $_POST["ticketType"];
$idRestaurante = $_POST["idRestaurante"];
$total         = 0;
var_dump($idRestaurante);
if(is_numeric($idRestaurante)){

/*TRAE EL ULTIMO TICKET */
$queryId     = 'SELECT (idChange + 1) as idChange FROM exchangedticket ORDER BY idChange DESC LIMIT 1';
$resultadoId = $conexion->query($queryId);
$columnasId  = $resultadoId->fetch();

$ultimo = $columnasId['idChange'];

$query     = 'SELECT * FROM restaurant WHERE id= "'.$idRestaurante.'" ';
$resultado = $conexion->query($query);
$columnas  = $resultado->fetch(PDO::FETCH_ASSOC);
$total     = $resultado->rowCount();

$queryMaitre     = 'SELECT person.name, person.surname FROM waiter INNER JOIN person WHERE waiter.nif = person.nif AND waiter.restContr ='.$idRestaurante.' ORDER BY RAND() LIMIT 1';
$resultadoMaitre = $conexion->query($queryMaitre);
$columnaseMaitre = $resultadoMaitre->fetch();

$nombreMaitre      = $columnaseMaitre['name']. ' '. $columnaseMaitre['surname'];
$nombreRestaurante = $columnas['name'];
}else{
  header("Location: ticketChange.php?mensaje=7");
  exit();
}

// Validar select correcto

if ($ticketType != "0"){
  if ($total>0){
    $insertExchange = 'INSERT INTO exchangedticket VALUES('.$ultimo.', "'.$ticketType.'", '.$idRestaurante.')';
    $resultadoInsert = $conexion->exec($insertExchange);

    if ($resultadoInsert === False){
        header("Location: ticketChange.php?mensaje= 5");
      	exit();
    }else{
         header("Location: ticketInserted.php?name=$nombreRestaurante&nameMaitre=$nombreMaitre");
  	     exit();
    }
  }else{
    header("Location: ticketChange.php?mensaje=4");
  	exit();
  }
}else{
  header("Location: ticketChange.php?mensaje=3");
	exit();
}








?>
