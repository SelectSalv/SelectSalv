<?php

class Partido extends ModeloBase
{

	private	$idPartido; 
	private	$nomPartido;
	private $estado;

	protected $con;
	

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

	public function getEstado()
	{
		return $this->estado;
	}
	public function setEstado($estado)
	{
		$this->estado=$estado;
	}


	//METODO PARA INSERTAR PARTIDO
	public function registrarPartido( $url)
	{

		$sql="INSERT INTO `partido`(`idPartido`, `nomPartido`, `ruta`, `estado`) VALUE(null,'".$this->nomPartido."', '".$url."', '".$this->estado."')";



		$info = $this->con->conectar()->query($sql);

		print_r($info);
		die();

		if($info)
		{
			$resp=1;
		}
		else
		{
			$resp=0;
			
		}
		return $resp;
	}
}
