	<nav class="navbar bg-primary fixed-top d-flex">
		<button type="button" style="margin-right: 10px;" id="btn-menu-nav" class=" p2 waves-effect waves-ripple waves-light btn btn-primary bmd-btn-icon align-middle">
				  <i id="flecha-atras-boleta" class="material-icons text-light">arrow_back</i>
		</button>
		<a class="navbar-brand text-header-boleta p2 mr-auto" style="color: #fff; font-family: 'Proxima-Regular';"><?php /echo $_SESSION["nomMunicipio"]*/.", ".$_SESSION["nomDepartamento"] ?></a>
		<div class="persona">
			<a class="nombre-header" style="color: #fff;" class="float-right p2 mr-auto navbar-text">
				<?php echo $_SESSION["apePersona"]*/.", ".$_SESSION["nomPersona"] ?>
				<br>
				<small class="float-right mr-auto" style=""><?php echo $_SESSION["dui"] ?></small>
			</a>
		</div>
	</nav>
