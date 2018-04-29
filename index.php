<?php

require_once 'app/config/global.php';

foreach (glob('app/core/*.php') as $doc) {
	require_once $doc;
}

if(!isset($_REQUEST["1"]))
{
	$controlador = CONTROLADOR_DEFECTO;

	require_once 'app/controller/'.$controlador.'Controller.php';

	$controlador = $controlador.'Controller';

	$controlador = new $controlador();

	$accion = ACCION_DEFECTO;

	$controlador->$accion();

} 
else
{
	$controller = $_REQUEST["1"];

	if(isset($_REQUEST["2"]))
	{
		$accion = $_REQUEST["2"];
	}
	else
	{
		$accion = ACCION_DEFECTO;	
	}
	
	require_once 'app/controller/'.$controller.'Controller.php';
	$carpeta = $controller;

	$controller = $controller.'Controller';

	$controller = new $controller();

	if(isset($_REQUEST["3"]))
	{
		$archivo = $_REQUEST["3"];

		if(isset($_REQUEST["4"]))
		{
			$header = $_REQUEST["4"];

			if(isset($_REQUEST["5"]))
			{
				$menu = $_REQUEST["5"];

				$controller->$accion($archivo, $carpeta, $header, $menu);	
			}
			else
			{
				$controller->$accion($archivo, $carpeta, $header);
			}
		} 
		else
		{
			$controller->$accion($archivo, $carpeta);
		}
	}
	else
	{
		$controller->$accion();
	}
	
}