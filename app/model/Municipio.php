<?php 

/**
* Nombre de la Clase: Municipio
* Autor: Carlos Campos
*/
class Municipio extends ModeloBase
{
	private $idMinicipio;
	private $nombreMunicipio;
	private $idDepartamento;

	function __construct()
	{
		parent:: __construct();	
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


// METODOS
    // Agregar municipio
    function AgregarMunicipio()
    {

    }

    //Modificar Municipio
    function ModificarMunicipio()
    {


    }
    //Eliminar Municipio
    function EliminarMunicipio()
    {

    }


}

 ?>