<?php  
	include 'plantillas.php';
	$plantilla = new Plantilla();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pruebas</title>
	<?php $plantilla->Zeldas() ?>
</head>
<body id="body">
	<div class="cuadro" id="c-login">
		<div class="cuadro-ins bg-primary">
			<p class="lead text-center">Ingresar</p>
		</div>
		<div class="wrap">
			<form id="frmLogin">
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="user" class="bmd-label-floating">Usuario</label>
							<input type="text" class="form-control" name="user" id="user">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="pass" class="bmd-label-floating">Contraseña</label>
							<input type="password" class="form-control" name="pass" id="pass">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<button type="button" class="waves-effect waves-light btn btn-raised btn-info" value="Ingresar" name="btnLogin" id="btnLogin">Ingresar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>