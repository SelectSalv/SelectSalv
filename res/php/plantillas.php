<?php

include '../proc/crypt.php';

class Plantilla{
 
	public function compInicioSesion()
	{
		session_start();
		if(isset($_SESSION["idUsuario"]))
		{
			if(empty($_SESSION["idUsuario"]))
			{
				header("Location: ../../index.php");
				
			} 
		} else {
			header("Location: ../../index.php");
			
		}
	}

	public function compInicioSesionVotante()
	{
		session_start();
		if(isset($_SESSION["duiVotante"]))
		{
			if(empty($_SESSION["duiVotante"]))
			{
				header("Location: ../../index.php");
				
			} 
		} else {
			header("Location: ../../index.php");
			
		}
	}

	public function HeaderBarUser()
	{
		echo '<nav class="navbar fixed-top navbar-dark bg-primary">
				<button type="button" style="margin-right: 10px;" id="btn-menu-nav" class=" p2 waves-effect waves-ripple waves-light btn btn-primary bmd-btn-icon align-middle">
				  <i id="menu-icon" class="material-icons text-light">menu</i>
				</button>
				<a class="navbar-brand vape-header align-middle mr-auto p2 text-white">
					<img src="../img/logoblanco.svg" class="align-middle" width="30">
					selectsalv
				</a>
				<div class="btn-group" style="margin:0;">
				  <button class="waves-effect waves-light waves-block btn btn-raised btn-success dropdown-toggle btn-sm" type="button" id="dropUsuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  '.$_SESSION["nomUsuario"].'
				  </button>
				  <div class="dropdown-menu" style="margin-left: -52px; " aria-labelledby="dropUsuario">
				  	<a class="dropdown-item" class="waves-effect" style="">'.$_SESSION["rol"].'</a>
				    <a class="dropdown-item" class="waves-effect" style="color: red;" href="../proc/logout.php">Cerrar Sesión</a>
				  </div>
				</div>
			</nav>';
	}

	public function HeaderBar()
	{
		echo '<nav class="navbar fixed-top d-flex">
		<button type="button" style="margin-right: 10px;" id="btn-menu-nav" class=" p2 waves-effect waves-ripple waves-light btn btn-primary bmd-btn-icon align-middle">
				  <i id="flecha-atras" class="material-icons text-light">arrow_back</i>
		</button>
	    <a class="navbar-brand vape-header mr-auto p2 text-white">
	      <img src="../img/logoblanco.svg" width="30" alt="">
	      selectsalv
	    </a>
	  </nav>';
	}

	public function Menu()
	{
		echo '<div class="menu">
		<ul class="list-menu">
		<p class="titulo-menu">Menú</p>
		<hr>
			<a class="" href="regPartido.php">
				<li class="list-item align-middle">
					<i class="menu-it-icon material-icons text-purp align-middle">flag</i>
					Gestionar Partidos
				</li>
			</a>
			<a class="" href="regCandidato.php">
				<li class="list-item align-middle">
					<i class="menu-it-icon material-icons text-purp align-middle">face</i>
					Gestionar Candidatos
				</li>
			</a>
			<a class="" href="regPersona.php">
				<li class="list-item align-middle">
					<i class="menu-it-icon material-icons text-purp align-middle">account_box</i>
					Gestionar Personas
				</li>
			</a>
		<hr>
			<a class="" href="dashboard.php">
				<li class="list-item align-middle">
					<i class="menu-it-icon material-icons text-purp align-middle">poll</i>
					Ver Resultados
				</li>
			</a>
			<a class="" href="verVotantes.php">
				<li class="list-item align-middle">
					<i class="menu-it-icon material-icons text-purp align-middle">people</i>
					Ver Votantes
				</li>
			</a>
		<hr>
		</ul>
	</div>';
	}

	public function Zeldas()
	{
	echo '	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
	<link rel="stylesheet" href="../plugins/BootstrapMD/BootstrapMD.css">
	<link rel="stylesheet" href="../css/fuentes.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/cuadros.css">
	<link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="../css/hero-1.css">
	<link rel="stylesheet" href="../css/validacion.css">
	<script src="../plugins/JQuery/jquery.js"></script>
	<script src="../plugins/popper.js"></script>
    <script src="../plugins/BootstrapMD/BootstrapMD.min.js"></script>
    <script src="../plugins/BootstrapMD/materialize.js"></script>
    <script src="../js/fondo.js"></script>
    <script src="../js/form-fix.js"></script>
    <script src="../js/animacion.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/barra-navegacion.js"></script>
    <script src="../plugins/JQueryMask/jquery.mask.js"></script>
    <script src="../js/mask-inputs.js"></script>';
	}
}