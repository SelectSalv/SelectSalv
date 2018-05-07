<?php

class Url
{
	public function url($controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO)
	{

		$url = "index.php?controller=".$controlador."&action=".$accion;

		return $url;
	}
}