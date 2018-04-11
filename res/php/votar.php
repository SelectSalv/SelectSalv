<?php  
	include 'plantillas.php';
	$plantilla = new Plantilla();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Vota | Selectsalv</title>
	<?php $plantilla->Zeldas() ?>
	<script src="../js/ingresar-dui.js"></script>
	<script>
	/*	$(document).ready(function() {
			if($('#dui').val() != "")
			{
				$('#dui').val("");
			}
		});*/
	</script>
</head>
<body id="body">
	<nav class="navbar fixed-top d-flex">
		<button type="button" style="margin-right: 10px;" id="btn-menu-nav" class=" p2 waves-effect waves-ripple waves-light btn btn-primary bmd-btn-icon align-middle">
				  <i id="flecha-atras-votar" class="material-icons text-light">arrow_back</i>
		</button>
	    <a class="navbar-brand vape-header mr-auto p2 text-white">
	      <img src="../img/logoblanco.svg" width="30" alt="">
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
							<label for="dui" class="bmd-label-floating">DUI</label>
							<input type="text" class="form-control dui" name="dui" id="dui">
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<button type="button" class="waves-effect waves-light btn btn-raised btn-primary" value="Ingresar" name="btnDUI" id="btnDUI">Votar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>