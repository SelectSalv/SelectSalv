<?php  
	include 'plantillas.php';
	include '../clases/Persona.php';
	
	$plantilla = new Plantilla();
	$persona = new Persona();

	$plantilla->compInicioSesionVotante();

	$dui = $_SESSION["duiVotante"];

	$persona->setDui($dui);
	$resultado = $persona->obtenerPersona();

	$fila = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SelectSalv | Votar</title>
	<?php $plantilla->Zeldas() ?>
</head>
<body id="body">
	<nav class="navbar bg-primary fixed-top d-flex">
		<button type="button" style="margin-right: 10px;" id="btn-menu-nav" class=" p2 waves-effect waves-ripple waves-light btn btn-primary bmd-btn-icon align-middle">
				  <i id="flecha-atras-boleta" class="material-icons text-light">arrow_back</i>
		</button>
		<a class="navbar-brand text-header-boleta p2 mr-auto" style="color: #fff; font-family: 'Proxima-Regular';"><?php echo $fila["nomMunicipio"].", ".$fila["nomDepartamento"] ?></a>
		<div class="persona">
			<a class="nombre-header" style="color: #fff;" class="float-right p2 mr-auto navbar-text">
				<?php echo $fila["apePersona"].", ".$fila["nomPersona"] ?>
				<br>
				<small class="float-right mr-auto" style=""><?php echo $fila["dui"] ?></small>
			</a>
		</div>
	</nav>
</body>
</html> 