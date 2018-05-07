
<nav class="navbar fixed-top navbar-dark bg-primary">
				<button type="button" style="margin-right: 10px;" id="btn-menu-nav" class=" p2 material-ripple waves-ripple waves-light btn btn-primary bmd-btn-icon align-middle">
				  <i id="menu-icon" class="material-icons text-light">menu</i>
				</button>
				<a class="navbar-brand vape-header align-middle mr-auto p2 text-white">
					<img src="res/img/logoblanco.svg" class="align-middle" width="30">
					selectsalv
				</a>
				<div class="btn-group" style="margin:0;">
				  <button class="material-ripple waves-light waves-block btn btn-raised btn-success dropdown-toggle btn-sm" type="button" id="dropUsuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <?php echo  $_SESSION["nomUsuario"]?>
				  </button>
				  <div class="dropdown-menu" style="margin-left: -52px; " aria-labelledby="dropUsuario">
				  	<a class="dropdown-item" class="material-ripple" style=""> <?php echo$_SESSION["rol"] ?> </a>
				    <a class="dropdown-item" class="material-ripple" style="color: red;" href="app/plugs/logout.php">Cerrar Sesión</a>
				  </div>
				</div>
			</nav>