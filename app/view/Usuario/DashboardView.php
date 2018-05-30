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

      
      google.charts.load('current', {'packages':['corechart']});

      
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Partido');
        data.addColumn('number', 'Voto');
        data.addRows([<?php echo $graficoPrincipal ?>]);

        
        var options = {
        				'legend': 'left',
                       'width':500,
                       'height':325,
                       'pieHole': 0.4,
                        slices: {
				            0: { color: '#78909C' },
				            1: { color: '#1AB5F1' },
				            2: { color: '#5363BD' },
				            3: { color: '#E84D4A' }
          }
                   	};

        
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
						<div class="grafico-dep" id="7-graf"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Santa ana
						</p>
						<div class="grafico-dep" id="3-graf"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Sonsonate
						</p>
						<div class="grafico-dep" id="4-graf"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Chalatenango
						</p>
						<div class="grafico-dep" id="11-graf"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							La Libertad
						</p>
						<div class="grafico-dep" id="1-graf"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							San Salvador
						</p>
						<div class="grafico-dep" id="2-graf"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Cuscatlán
						</p>
						<div class="grafico-dep" id="10-graf"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							La Paz
						</p>
						<div class="grafico-dep" id="8-graf"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Cabañas
						</p>
						<div class="grafico-dep" id="14-graf"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							San Vicente
						</p>
						<div class="grafico-dep" id="13-graf"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Usulután
						</p>
						<div class="grafico-dep" id="6-graf"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							San Miguel
						</p>
						<div class="grafico-dep" id="5-graf"></div>
					</div>
				</div>
			</div>
			<div class="row" style="justify-content: center;">
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							Morazán
						</p>
						<div class="grafico-dep" id="12-graf"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tarjeta tarjeta-md">
						<p class="titulo-tarjeta-sec">
							La Unión
						</p>
						<div class="grafico-dep" id="9-graf"></div>
					</div>
				</div>
			</div>
		</div>
	</div>