<?php 

/**
* Municipio Class
*/
class Municipio
{
	private $idMinicipio;
	private $nombreMunicipio;
	private $idDepartamento;

	function __construct()
	{
		
	}

	//metodos get y set
	function getIdPartido()
	{
		return $this->idMinicipio;
	}
	function getNombreIdMunicipio()
	{
		return $this->nombreMunicipio;
	}
	function setNombreMunicipio($nombreMunicipio)
	{
		$this->nombreMunicipio=$nombreMunicipio;
	}
	function getIdDepartamento()
	{
		return $this->idDepartamento;
	}

    function setIdDepartamento($idDepartamento)
    {
           $this->idDepartamento=$idDepartamento;
    }



}

 ?>