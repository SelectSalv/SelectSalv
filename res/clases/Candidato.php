<?php 
require_once "Partido.php";
require_once "Persona.php";
	
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

	    # Método Inicializador de La clase
	    public function Candidato()
	    {
	    	$partido = new Partido();
	    	$persona = new Persona();
	    }

	    # Métodos GET y SET para idCandidato
	    public function getIdCandidato()
	    {
	    	return $this->idCandidato;
	    }
	    public function setIdCandidato($id)
	    {
	    	$this->idCandidato = $id;
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