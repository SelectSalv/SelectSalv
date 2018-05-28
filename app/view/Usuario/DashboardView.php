
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {
                       'width':500,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('graf-global'));
        chart.draw(data, options);
      }
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
					<div class="tarjeta tarjeta-xl" style="background-image: url(res/img/partidos/nuevasIdeas.jpg)">
						<div class="humo" style="padding: 15px;">
							<p class="titulo-tarjeta-sec">
								Nuevas Ideas
							</p>
							<p class="porcentaje-partido">
								56%
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="tarjeta tarjeta-xl" style="background-image: url(res/img/partidos/arena.jpg)">
						<div class="humo" style="padding: 15px;">
							<p class="titulo-tarjeta-sec">
								Arena
							</p>
							<p class="porcentaje-partido">
								38%
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