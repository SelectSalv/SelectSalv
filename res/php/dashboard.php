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
	<script src="../plugins/JQuery/jquery.js"></script>
	<script src="../plugins/popper.js"></script>
    <script src="../plugins/BootstrapMD/BootstrapMD.min.js"></script>
    <script src="../plugins/BootstrapMD/materialize.js"></script>
    <script src="../js/fondo.js"></script>
    <script src="../js/animacion.js"></script>
    
</head>
<body>
	<nav>
		
	</nav>
	<div class="menu">
		<button type="button" style="float:right; margin-right:-20px;margin-top: 20px;" class="btn btn-primary bmd-btn-fab bmd-btn-fab-sm waves-effect waves-light">
    <i class="material-icons">menu</i>
  </button>
	</div>

</body>
</html>