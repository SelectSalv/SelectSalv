<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="res/plugins/Material-Icons/material-icons.css">
	<link rel="icon" type="image/png" sizes="32x32" href="res/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="res/favicon/favicon-16x16.png">
	<link rel="stylesheet" href="res/plugins/BootstrapMD/BootstrapMD.css">
	<link rel="stylesheet" href="res/css/fuentes.css">
	<link rel="stylesheet" href="res/css/main.css">
	<link rel="stylesheet" href="res/css/cuadros.css">
	<link rel="stylesheet" href="res/css/menu.css">
	<link rel="stylesheet" href="res/css/hero-1.css">
	<link rel="stylesheet" href="res/css/validacion.css">
	<link rel="stylesheet" href="res/plugins/ripple/ripple.css">
	<link rel="stylesheet" type="text/css" href="res/plugins/sweetalert-master/dist/sweetalert.css">
    

	<script src="res/plugins/JQuery/jquery.js"></script>
	<script src="res/plugins/popper.js"></script>
    <script src="res/plugins/BootstrapMD/BootstrapMD.min.js"></script>
    <script src="res/plugins/ripple/ripple.js"></script>
    <script src="res/plugins/ripple/ripple.init.js"></script>
    <script src="res/js/fondo.js"></script>
    <script src="res/js/form-fix.js"></script>
    <script src="res/js/animacion.js"></script>
    <script src="res/js/tooltips.js"></script>
    <script src="res/js/menu.js"></script>
    <script src="res/js/botones.js"></script>
    <script src="res/js/barra-navegacion.js"></script>
    <script src="res/plugins/JQueryMask/jquery.mask.js"></script>

    <script type="text/javascript" src="res/plugins/sweetalert-master/dist/sweetalert.min.js"></script>	
    <script src="res/plugins/date.js"></script>
    <script src="res/js/mask-inputs.js"></script>
    <script src="res/plugins/bootstrapAutocomplete/autocomplete.js"></script>

    <title>
    	SelectSalv
    	<?php  
    		if(isset($_SESSION["nomUsuario"]))
    		{
    			if(!empty($_SESSION["nomUsuario"]))
    			{
    				echo " | ".$_SESSION["nomUsuario"];
    			}
    		}
    	?>
    </title>
</head>
<body id="body">

