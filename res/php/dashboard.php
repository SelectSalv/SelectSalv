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
	<?php $plantilla->Zeldas() ?>
	<link rel="stylesheet" href="../css/grid.css">
 <!--    <script>
    	$(document).ready(function() {
    		var alt = $('.navbar').height();
    		alert(alt);
    	});
    </script> -->
</head>
<body id="body">
	<?php $plantilla->HeaderBar() ?>
	<div class="menu">
		<ul class="list-menu">
			<a class="" href="">
				<li class="list-item align-middle">
					<i class="menu-it-icon material-icons text-purp align-middle">flag</i>
					Registar Partido
				</li>
			</a>
			<a class="" href="regPersona.php">
				<li class="list-item align-middle">
					<i class="menu-it-icon material-icons text-purp align-middle">account_box</i>
					Registar Persona
				</li>
			</a>
			<a class="" href="">
				<li class="list-item align-middle">
					<i class="menu-it-icon material-icons text-purp align-middle">poll</i>
					Ver Estadística
				</li>
			</a>
		</ul>
	</div>
	<div class="contenedor">
		<div class="barra-titulo">
			<p class="texto-barra-titulo">
				Dashboard
			</p>
		</div>
		<div class="graficos">

			<div class="row">
				<div class="col-md-12">
					<div class="tarjeta tarjeta-uno">
						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="tarjeta tarjeta-xl">
						
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="tarjeta tarjeta-xl">
						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
			</div>
			<div class="row" style="justify-content: center;">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md"></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>