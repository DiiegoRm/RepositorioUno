<?php
$texto = "";
	if(isset($_GET["mensaje"])){
		$mensaje = $_GET["mensaje"];

		if($mensaje == 1)
			$texto = "Clave o usuario incorrectos, intente de nuevo";

		if($mensaje == 2)
			$texto = "ingreso";

		if($mensaje == 3)
			$texto = "Debe escoger un tipo de ticket";

		if($mensaje == 4)
			$texto = "el c&oacute;digo del restaurante no existe";

		if($mensaje == 5)
			$texto = "Lo sentimos no se pudo registrar su ticket";

		if($mensaje == 6)
			$texto = "Se agrego Correctamente el registro";

		if($mensaje == 7)
			$texto = "El id de Restaurante debe ser numerico";
	}

	if($texto != ""){
?>

<div class="alert alert-danger">
	<p><?=$texto?></p>
</div>
<?php } ?>
