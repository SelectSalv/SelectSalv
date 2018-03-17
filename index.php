<?php  ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SelectSalv</title>
	<link rel="icon" type="image/png" sizes="32x32" href="res/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="res/favicon/favicon-16x16.png">
  <link rel="stylesheet" href="res/plugins/BootstrapMD/BootstrapMD.css">
	<link rel="stylesheet" href="res/css/main.css">
  <link rel="stylesheet" href="res/css/hero-1.css">
	<script src="res/plugins/JQuery/jquery.js"></script>
  <script src="res/plugins/popper.js"></script>
  <script src="res/plugins/BootstrapMD/bootstrap-material-design.js"></script>
  <script src="res/plugins/BootstrapMD/materialize.js"></script>
  <script>
    $(document).ready(function() {
        var alt = $(window).height();
        $('.banner').css('height', alt + 'px');
        $('.footer').css('height', alt + 'px');
        $(window).resize(function() {
           var alt = $(window).height();
        $('.banner').css('height', alt + 'px');
        $('.footer').css('height', alt + 'px');
        });
    })
  </script>
<body>
<nav class="navbar fixed-top d-flex">
  <a class="navbar-brand vape-header mr-auto p2 text-white">
    <img src="res/img/logoblanco.svg" width="40" alt="">
    selectsalv
  </a>
  <a class="waves-effect waves-light btn btn-raised btn-danger p-2">Iniciar Sesión</a>
</nav>

<div class="banner">
  <h1 class="display-1" style="color: #fff;">Vota hoy</h1>
  <a class="waves-effect waves-light btn btn-raised btn-danger btn-lg p-2" style="font-family: 'neutra';">Votar</a>
</div>
<div class="footer">
  
</div>
	
</body>
</html>