<?php 
/*
*clase partido
*/
class Partido
{
	//Propiedades
	private	$idPartido; 
	private	$nomPartido;
	
	public function getidPartido()
	{
		return $this->idPartido;
	}
	public function getNombrePartido()
	{
		return $this->nomPartido;
	}
	public function setNombrePartido($nomPartido)
	{
		$this->nomPartido=$nomPartido;
	}
}

 ?>