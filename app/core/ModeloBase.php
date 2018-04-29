<?php

class ModeloBase
{

	protected $con;

	public function __construct()
	{
		require_once 'app/core/Conexion.php';
		$this->con = new Conexion();
	}	
}