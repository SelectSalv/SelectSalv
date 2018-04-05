<?php  
	include 'plantillas.php';
	$plantilla = new Plantilla();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Vota | Selectsalv</title>
	<?php $plantilla->Zeldas() ?>
	<script src="../js/ingresar-dui.js"></script>
	<script>
		$(document).rea
	</script>
</head>
<body id="body">
	<?php 
		$plantilla->HeaderBar();
	?>
	<div class="cuadro centro" id="c-dui">
		<div class="cuadro-ins bg-primary">
			<p class="lead text-center">Ingrese su número de DUI</p>
		</div>
		<div class="wrap">
			<form id="frmDui">
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="dui" class="bmd-label-floating">DUI</label>
							<input type="text" class="form-control" name="dui" id="dui">
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<button type="button" class="waves-effect waves-light btn btn-raised btn-primary" value="Ingresar" name="btnDUI" id="btnDUI">Votar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>