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
				Votantes por JRV
			</p>
		</div>
		<div style="width:100%;margin:auto;">
		<table class="table table-hover">
			<t-head class="thead-dark text-light bg-secondary">
				<tr>
					<th>DUI</th>
					<th>Apellidos</th>
					<th>Nombres</th>
					<th>Voto</th>
				</tr>
			</t-head>
			<tbody>
				<?php
					for ($i=0; $i <= 7 ; $i++) { 
						echo "<tr>	
								<td>12345678-9</td>
								<td>Vaquerano Contreras</td>
								<td>Saturnino Donato</td>
								<td><i class='material-icons'>done</i></td>
							</tr>

							<tr>	
								<td>78945612-3</td>
								<td>Segoviano Martinez</td>
								<td>Enrique Alfonso</td>
								<td><i class='material-icons'>done</i></td>
							</tr>

							<tr>	
								<td>78912345-6</td>
								<td>Escobar Gaviria</td>
								<td>Pablo Emilio</td>
								<td><i class='material-icons'>close</i></td>
							</tr>";	
					}
				?>
			</tbody>
		</table>
	</div>
	</div>
</body>
</html>