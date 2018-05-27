<?php  

	// require_once 'app/model/Papeleta.php';

	// $papeleta = new Papeleta();

?>


<link rel="stylesheet" href="res/css/grid.css">
<link rel="stylesheet" href="res/css/boleta.css">

<script src="res/ajax/BoletaAjax.js"></script>

<!-- Modal Votar -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalVotar" tabindex="-1" role="dialog" aria-labelledby="modalregistrarPersona" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-votar">
		        <h5 class="modal-title" id="modal-title-votar">Confirmar Voto</h5>
		      </div>		
		      <div id="modal-body-votar" class="modal-body">
		      	
		      </div>
		      <div class="modal-footer" id="modal-footer-votar">
		       <button type="button" id="btnCancelarVotar" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnModalVotar" data-dismiss="modal" class="btn btn-info">Aceptar</button>
		      </div>
		    </div>
		</div>
	</div>

<!-- Modal Voto Nulo -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalVotoNulo" tabindex="-1" role="dialog" aria-labelledby="modalregistrarPersona" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-nulo">
		        <h5 class="modal-title" id="modal-title-nulo">Voto Nulo</h5>
		      </div>		
		      <div id="modal-body-nulo" class="modal-body">
		      	¿Está seguro de anular su Voto?
		      </div>
		      <div class="modal-footer" id="modal-footer-nulo">
		       <button type="button" id="btnCancelarNulo" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnNulo" data-dismiss="modal" class="btn btn-info">Aceptar</button>
		      </div>
		    </div>
		</div>
	</div>

<div class="contenedor">
	<div class="barra-titulo-boleta" style="display: flex; align-items:baseline; justify-content: space-between;">
			<p style="display: block;" class="texto-barra-titulo-boleta">
				Papeleta
			</p>
			<button style="display: block; margin-right: 5px;" voto="1" id="btnVotoNulo" type="button" class="ml-auto p2 btn btn-secondary elemento-boleta" >Anular Voto</button>
			<button style="display: block;" id="btnVotar" type="button" class="p2 btn btn-secondary" disabled="disabled">Votar</button>
	</div>
	<hr style="margin-top:0;">
	<div class="boleta">
		<div class="row">
			
