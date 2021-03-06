<script src="res/ajax/PersonaAjax.js"></script>

<script>
	$(document).ready(function() {
		setTimeout(function() {
			$('#duiVotar').focus();
		}, 500);
	});
</script>
<script>
	$(document).ready(function() {
		$('title').html('SelectSalv');
	});
</script>

<nav class="navbar fixed-top d-flex">
		<button type="button" style="margin-right: 10px;" id="btn-menu-nav" class=" p2 material-ripple waves-ripple waves-light btn btn-primary bmd-btn-icon align-middle">
				  <i id="flecha-atras-votar" class="material-icons text-light">arrow_back</i>
		</button>
	    <a class="navbar-brand vape-header mr-auto p2 text-white">
	      <img src="res/img/logoblanco.svg" width="30" alt="">
	      selectsalv
	    </a>
	  </nav>
	<div class="cuadro centro" id="c-dui">
		<div class="cuadro-ins bg-primary">
			<p class="lead text-center">Ingrese su número de DUI</p>
		</div>
		<div class="wrap">
			<form id="frmDui">
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label id="label-dui" for="dui" class="bmd-label-floating">DUI</label>
							<input type="text" class="form-control dui requeridoDui" name="duiVotar" id="duiVotar">
							<div id="mensajeDui" class="invalid-feedback"></div>
							<span id="ayudaDui" class="bmd-help">El guión será agregado automáticamente</span>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<button type="button" class="material-ripple waves-light btn btn-raised btn-primary" value="Ingresar" name="btnDUI" id="btnDUI">Votar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>