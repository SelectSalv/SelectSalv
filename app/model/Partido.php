<?php

class Partido extends ModeloBase
{

	private	$idPartido; 
	private	$nomPartido;
	

	public function __construct()
	{
		parent::__construct();
	}

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
