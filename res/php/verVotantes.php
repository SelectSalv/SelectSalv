<?php 
	include 'plantillas.php';
	$plantilla = new plantilla();
	$plantilla->compInicioSesion();
	$nomUsuario = $_SESSION["nomUsuario"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<title><?php echo $nomUsuario; ?> | Ver Votantes</title>
	<?php $plantilla->Zeldas() ?>
	<link rel="stylesheet" href="../css/grid.css">
</head>
<body id="body">
	<?php 
		$plantilla->HeaderBarUser(); 
		$plantilla->Menu();
	?>

	<div class="contenedor">
		<div class="barra-titulo">
			<p class="texto-barra-titulo">
				Lista de Votantes por JRV
			</p>
		</div>
	</div>
</body>
</html>