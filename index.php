<?php  ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Selectsalv</title>
	<link rel="icon" type="image/png" sizes="32x32" href="res/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="res/favicon/favicon-16x16.png">
  <link rel="stylesheet" href="res/plugins/BootstrapMD/BootstrapMD.css">
  <link rel="stylesheet" href="res/css/fuentes.css">
	<link rel="stylesheet" href="res/css/main.css">
  <link rel="stylesheet" href="res/css/hero-1.css">
	<script src="res/plugins/JQuery/jquery.js"></script>
  <script src="res/plugins/popper.js"></script>
  <script src="res/plugins/BootstrapMD/bootstrap-material-design.js"></script>
  <script src="res/plugins/BootstrapMD/materialize.js"></script>
  <script src="res/js/fondo.js"></script>
  <script src="res/js/height2.js"></script>
<body>
  <nav class="navbar fixed-top d-flex">
    <a class="navbar-brand vape-header mr-auto p2 text-white">
      <img src="res/img/logoblanco.svg" width="30" alt="">
      selectsalv
    </a>
    <a  href="res/php/votar.php" class="waves-effect waves-light btn btn-raised btn-success btn-header p-2">vota</a>
  </nav>

  <div class="banner">
    <div class="contenedor-hero-1">
      <h1 class="display-1 text-center">Vota hoy</h1>
      <h2 class="display-4">haz valer tu opinión</h2>
      <a href="res/php/votar.php" class="btn-centro waves-effect waves-light btn btn-raised btn-success btn-lg p-2" style="font-family: 'neutra';">Votar</a>
    </div>
  </div>

  <div class="hero-2 parallax">
      <div class="contenedor-hero-flex">
         <div>
           <h1 class="display-2 text-center">La importancia del voto:</h1>
           <hr class="hr-titulo">
         </div>
      </div>
  </div>
  <div class="hero-3 parallax">
      <div class="contenedor-hero-flex">
         <div>
           <h1 class="display-2 text-center">Democracia</h1>
           <hr class="hr-titulo">
         <!--   <h6>Manifestación de la opinión, del parecer o de la voluntad de cada una de las personas consultadas para aprobar o rechazar una medida o, en unas elecciones, para elegir a una persona o partido.</h6> -->
         </div>
      </div>
  </div>
  <div class="footer">
    <div class="contenedor-footer">
      <div class="top">
        <div class="top-left">
          <p class="lead footer-titulo-vape ">selectsalv</p>
          <p class="text-light text-footer">Sistema de votación en línea, hecho por salvadoreños para salvadoreños</p>
        </div>
        <div class="top-right">
          <p class="lead footer-titulo-neutra ">
            Más
          </p>
          <ul class="">
            <li><a class="footer-list" href="res/php/login.php">Iniciar Sesión</a></li>
            <li><a class="footer-list" href="">Preguntas Frecuentes</a></li>
            <li><a class="footer-list" href="">ola ke ase</a></li>
          </ul>
        </div>
      </div>
      <div class="bottom">
        <p class="copyright">© 2018 Equipo Dinamita</p>
      </div>
    </div>
  </div>
</body>
</html>