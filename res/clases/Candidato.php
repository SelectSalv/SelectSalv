<?php 
require_once "Partido.php";
require_once "Persona.php";
include 'Conexion.php';
	
	/**
	* Nombre de la Clase: Candidato
	* Autor: Michelle Urbina
	*/
	class Candidato
	{
		private $idCandidato;
		private $idPartido;
	    private $idTipoCandidato;
	    private $idPersona;

	    protected $con;

	    //MÉTODO INICIALIZADOR CLASE CANDIDATO
	    public function Candidato()
	    {
	    	$partido = new Partido();
	    	$persona = new Persona();

	    	$this->con = new Conexion();
	    }

	    // REFACTORIZACIÓN DE PROPIEDADES CLASE CANDIDATO

	    # Métodos GET y SET para idCandidato
	    public function getIdCandidato()
	    {
	    	return $this->idCandidato;
	    }

	    # Métodos GET y SET para idPartido
	    public function getIdPartido()
		{
			return $this->idPartido;
		}
		public function setIdPartido($id)
		{
			$this->idPartido = $id;
		}

		# Métodos GET y SET para idTipoCandidato
		public function getIdTipoCandidato()
		{
			return $this->idTipoCandidato;
		}
		public function setIdTipoCandidato($id)
		{
			$this->idTipoCandidato = $id;
		}

		# Métodos GET y SET para Idpersona
		public function getIdPersona()
		{
			return $this->idPersona;
		}
		public function setIdPersona($id)
		{
			$this->idPersona = $id;
		}

		# MÉTODO PARA REGISTRAR CANDIDATO
		public function regCandidato()
		{

		}

		# MÉTODO PARA MODIFICAR CANDIDATO
		public function modCandidato()
		{

		}

		# MÉTODO PARA ELIMINAR CANDIDATO
		public function eliminarCandidato()
		{

		}

		# MÉTODO PARA BUSCAR CANDIDATO
		public function buscarCandidato()
		{
			
		}
	}

 ?>