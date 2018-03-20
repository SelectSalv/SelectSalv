<?php  
	include 'plantillas.php';
	$plantilla = new Plantilla();
	$plantilla->compInicioSesion();
	$nomUsuario = $_SESSION["nomUsuario"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $nomUsuario; ?> | Registrar Persona </title>
	<?php $plantilla->Zeldas() ?>
</head>
<body id="body">
	<?php $plantilla->HeaderBar() ?>
	<div class="cuadro cuadro-centro" id="c-frm">
		
	</div>
</body>
</html>