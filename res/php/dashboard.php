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
					<i class="menu-it-icon material-icons text-light align-middle">flag</i>Registar Partido</li>
			</a>
			<a class="" href="regPersona.php">
				<li class="list-item align-middle"><i class="menu-it-icon material-icons text-light align-middle">account_box</i>Registar Persona</li>
			</a>
			<a class="" href="">
				<li class="list-item align-middle"><i class="menu-it-icon material-icons text-light align-middle">poll</i>Ver Estadística</li>
			</a>
		</ul>
	</div>

</body>
</html>