<?php  
	include 'plantillas.php';
	$plantilla = new PLantilla();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ingresar | Selectsalv</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
	<link rel="stylesheet" href="../plugins/BootstrapMD/BootstrapMD.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/cuadros.css">
	<link rel="stylesheet" href="../css/hero-1.css">
	<link rel="stylesheet" href="../css/fuentes.css">
	<script src="../plugins/JQuery/jquery.js"></script>
	<script src="../plugins/popper.js"></script>
    <script src="../plugins/BootstrapMD/BootstrapMD.min.js"></script>
    <script src="../plugins/BootstrapMD/materialize.js"></script>
    <script src="../js/fondo.js"></script>
    <script src="../js/animacion.js"></script>
    <script src="../js/form-fix.js"></script>
    <script src="../js/login.js"></script>
</head>
<body id="body">
	<?php 
		$plantilla->HeaderBar();
	?>
	<div class="cuadro c-centro" id="c-login">
		<div class="cuadro-ins bg-info" id="c-ins-login">
			<p class="lead text-center" id="title-login">Ingresar</p>
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