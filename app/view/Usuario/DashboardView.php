<?php 

	if(!empty($partidosPrincipales))
	{
		if($partidosPrincipales[0]["nomPartido"] == "Voto Nulo")
		{
			$nomPartido1 = $partidosPrincipales[1]["nomPartido"];
			$rutaPartido1 =  $partidosPrincipales[1]["rutaBandera"];
			$porcentajePartido1 = $partidosPrincipales[1]["votos"];
			$numVotos1 = $partidosPrincipales[1]["nVotos"];
		} else
		{
			$nomPartido1 = $partidosPrincipales[0]["nomPartido"];
			$rutaPartido1 =  $partidosPrincipales[0]["rutaBandera"];
			$porcentajePartido1 = $partidosPrincipales[0]["votos"];
			$numVotos1 = $partidosPrincipales[0]["nVotos"];
		}
		if(isset($partidosPrincipales[1]))
		{
			if($partidosPrincipales[1]["nomPartido"] == "Voto Nulo" || $partidosPrincipales[0]["nomPartido"] == "Voto Nulo")
			{
				if(!isset($partidosPrincipales[2]))
				{
					$nomPartido2 = 'Partido 2';
					$rutaPartido2 =  'res/img/partidos/gray.jpg';
					$porcentajePartido2 = '';
					$numVotos2 = '';
				} else
				{
					$nomPartido2 = $partidosPrincipales[2]["nomPartido"];
					$rutaPartido2 =  $partidosPrincipales[2]["rutaBandera"];
					$porcentajePartido2 = $partidosPrincipales[2]["votos"];
					$numVotos2 = $partidosPrincipales[2]["nVotos"];
				}
			} else
			{
				$nomPartido2 = $partidosPrincipales[1]["nomPartido"];
				$rutaPartido2 =  $partidosPrincipales[1]["rutaBandera"];
				$porcentajePartido2 = $partidosPrincipales[1]["votos"];
				$numVotos2 = $partidosPrincipales[1]["nVotos"];
			}
		}
	}

?>


<script type="text/javascript" src="res/plugins/googleCharts/google-charts.js"></script>

   <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([<?php echo $graficoPrincipal ?>]);

        // Set chart options
        var options = {
        				'legend': 'left',
                       'width':500,
                       'height':325,
                       'pieHole': 0.4,
                   	};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('graf-global'));
        chart.draw(data, options);
      }
    </script>

	<script>
		$(document).ready(function() {

			var nomDep;

			$('#Capa_1 .dep-mapa').each(function() {
				nomDep = $(this).attr("name");
				nomDep = nomDep.trim();

				 $(this).tooltip({
	                title: nomDep,
	                trigger: "hover",
	                placement: "top"
             	});
			});
		});
	</script>

<link rel="stylesheet" href="res/css/grid.css">
<div class="contenedor">
		<div class="barra-titulo">
			<p class="texto-barra-titulo">
				Inicio
			</p>
		</div>
		<div class="graficos">

			<div class="row">
				<div class="col-md-12">
					<div class="tarjeta tarjeta-uno">
						<p class="titulo-tarjeta-uno">Resultados Globales</p>
						<div class="mapa">
							<?php require_once 'res/img/svgsv.svg'; ?>
						</div>
						<div class="stats" id="graf-global">
							
						</div>
					</div>
				</div>
			</div>


			<p class="titulo-helper">
				Partidos Principales
			</p>

			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="tarjeta tarjeta-xl">
						<div class="tarjeta-bandera"  style="background-image: url(<?php echo (isset($rutaPartido1)) ? $rutaPartido1 : 'res/img/partidos/gray.jpg'; ?>">
							
						</div>
						<div class="info-porcentaje">
							<p class="titulo-tarjeta-sec">
								<?php echo (isset($nomPartido1)) ? $nomPartido1 : 'Partido 1'; ?>
							</p>
							<p class="porcentaje-partido">
								<?php echo (isset($porcentajePartido1)) ? $porcentajePartido1 : ''; ?>
							</p>
							<p class="num-votos">
								<?php
								if(isset($numVotos1))
								{
									if($numVotos1 == 1 )
									{
										echo $numVotos1." Voto"; 
									}
									else
									{
										echo $numVotos1." Votos"; 
									}
								}
									
								?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="tarjeta tarjeta-xl">
						<div class="tarjeta-bandera"  style="background-image: url(<?php echo (isset($rutaPartido2)) ? $rutaPartido2 : 'res/img/partidos/gray.jpg'; ?>">
							
						</div>
						<div class="info-porcentaje">
							<p class="titulo-tarjeta-sec">
								<?php echo (isset($nomPartido2)) ? $nomPartido2 : 'Partido 2'; ?>
							</p>
							<p class="porcentaje-partido">
								<?php echo (isset($porcentajePartido2)) ? $porcentajePartido2 : ''; ?>
							</p>
							<p class="num-votos">
								<?php
								if(isset($numVotos2))
								{
									if($numVotos2 == 1 )
									{
										echo $numVotos2." Voto"; 
									}
									else
									{
										echo $numVotos2." Votos"; 
									}
								}
									
								?>
							</p>
						</div>
					</div>
				</div>
			</div>

			<p class="titulo-helper">
				Resultados Departamentales
			</p>

			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Ahuachapán
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Santa ana
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Sonsonate
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Chalatenango
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							La Libertad
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							San Salvador
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Cuscatlán
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							La Paz
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Cabañas
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							San Vicente
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Usulután
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							San Miguel
						</p>
					</div>
				</div>
			</div>
			<div class="row" style="justify-content: center;">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Morazán
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							La Unión
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>