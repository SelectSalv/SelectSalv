<link rel="stylesheet" href="res/css/grid.css">
<link rel="stylesheet" href="res/css/boleta.css">

<script>
	$(document).ready(function() {
		$('#nuevasIdeas').css('background-image', 'url(res/img/partidos/nuevasIdeas.jpg)');
		$('#arena').css('background-image', 'url(res/img/partidos/arena.jpg)');
		$('#fmln').css('background-image', 'url(res/img/partidos/fmln.jpg)');
	});	
</script>
<script>
	$(document).ready(function() {
		$('.cuadro-boleta').css('height','70vh');
	});
</script>
<script>
	/*$(window).resize(function() {
		$('.cuadro-boleta').css('height', altura + 'px');
	});*/
</script>

<div class="contenedor">
	<div class="barra-titulo-boleta" style="display: flex; align-items:baseline; justify-content: space-between;">
			<p style="display: block;" class="texto-barra-titulo-boleta">
				Papeleta
			</p>
			<button style="display: block;" type="button" class="btn btn-secondary btn-raised" >Votar</button>
	</div>
	<hr style="margin-top:0;">
	<div class="boleta">
		<div class="row">
			<div class="col-md-4 col-sm-12">
				<div class="cuadro-boleta" id="nuevasIdeas">
					<div class="humo">
						<div class="detalles-partido">
							<p class="nombre-partido">
								Nuevas Ideas
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="cuadro-boleta" id="arena">
					<div class="humo">
						<div class="detalles-partido">
							<p class="nombre-partido">
								Arena
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="cuadro-boleta" id="fmln">
					<div class="humo">
						<div class="detalles-partido">
							<p class="nombre-partido">
								FMLN
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="cuadro-boleta" id="">
					<div class="humo">
						<div class="detalles-partido">
							<p class="nombre-partido">
								FMLN
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="cuadro-boleta" id="">
					<div class="humo">
						<div class="detalles-partido">
							<p class="nombre-partido">
								FMLN
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="cuadro-boleta" id="">
					<div class="humo">
						<div class="detalles-partido">
							<p class="nombre-partido">
								FMLN
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="cuadro-boleta" id="">
					<div class="humo">
						<div class="detalles-partido">
							<p class="nombre-partido">
								FMLN
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="cuadro-boleta" id="">
					<div class="humo">
						<div class="detalles-partido">
							<p class="nombre-partido">
								FMLN
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>