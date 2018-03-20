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
	<title><?php echo $nomUsuario; ?> | Dashboard</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
	<link rel="stylesheet" href="../plugins/BootstrapMD/BootstrapMD.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="../css/hero-1.css">
	<script src="../plugins/JQuery/jquery.js"></script>
	<script src="../plugins/popper.js"></script>
    <script src="../plugins/BootstrapMD/BootstrapMD.min.js"></script>
    <script src="../plugins/BootstrapMD/materialize.js"></script>
    <script src="../js/fondo.js"></script>
    <script src="../js/animacion.js"></script>
    
</head>
<body id="body">
	<nav class="navbar navbar-dark bg-primary">
		<button type="button" style="margin-right: 10px;" id="btn-menu-nav" class=" p2 waves-effect waves-ripple waves-light btn btn-primary bmd-btn-icon align-middle">
		  <i class="material-icons text-light">menu</i>
		</button>
		<a class="navbar-brand vape-header align-middle mr-auto p2 text-white">
			<img src="../img/logoblanco.svg" class="align-middle" width="30">
			selectsalv
		</a>
		<div class="btn-group" style="margin:0;">
		  <button class="waves-effect waves-light waves-block btn btn-raised btn-success dropdown-toggle btn-sm" type="button" id="dropUsuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		   <?php echo $nomUsuario ?>
		  </button>
		  <div class="dropdown-menu" style="margin-left: -52px; " aria-labelledby="dropUsuario">
		    <a class="dropdown-item" class="text-danger" style="color: red;" href="../proc/logout.php">Cerrar Sesión</a>
		  </div>
		</div>
	</nav>
	<div class="menu">
	</div>

</body>
</html>