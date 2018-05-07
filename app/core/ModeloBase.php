<?php

class ModeloBase
{

	protected $con;

	public function __construct()
	{
		require_once 'app/core/Conexion.php';
		require_once 'app/config/verificacionGlobal.php';
		$this->con = new Conexion();
	}	
}