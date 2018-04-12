<?php 
/**
* Nombre de la Clase: Departamento

*/
class Departamento
{
	private $idDepartamento;
	private $nombreDepartamento;

	
	function __construct()
	{
	}

	// metodos get para el idDepartamento

	function getIdDepartamento()
	{
		return $this->idDepartamento;
	}

    #Metodos get y set para Nombre del Municipio
	function getNombreDepartamento()
	{
		return $this->nombreDepartamento;
	}

	function setNombreDepartamento($nombreDepartamento)
	{
		$this->nombreDepartamento=$nombreDepartamento;
	}



	// 	METODOS

	//Agregar Depetarmento

	function AgregarDepartamento()
	{

	}
	#Metodo para Modificar Departamento

	function ModificarDepartamento()
	{

	}

	#Metodo para Eliminar un Departamento
	function EliminarDepartamento()
	{
		
	}
}





 ?>