<?php  
	include 'plantillas.php';
	$plantilla = new Plantilla();
	$plantilla->compInicioSesion();
	$nomUsuario = $_SESSION["nomUsuario"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $nomUsuario; ?> | Registrar Partido </title>
	<?php $plantilla->Zeldas() ?>
</head>
<body id="body">
	<?php 
		$plantilla->HeaderBarUser(); 
		$plantilla->Menu();
	?>
	<div class="cuadro" id="c-partido">
		<div class="cuadro-ins bg-info">
			<p class="lead text-center">
				Registrar Partido Político
			</p>
		</div>
		<div class="wrap">
			<form id="frmPartido">
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="nomPartido" class="bmd-label-floating">Nombre del Partido</label>
							<input type="text" class="form-control" name="nomPartido" id="nomPartido">
						</div>
					</div>
				</div>
				<br>
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
							  <label class="custom-file-label" for="customFileLang">Seleccionar Bandera</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<button type="button" id="btnPersona" name="btnPartido" class="waves-effect waves-light btn btn-raised btn-info">Registrar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>