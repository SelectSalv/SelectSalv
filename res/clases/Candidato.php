<?php 
require_once "Partido.php";
require_once "Persona.php";
	
	/**
	* clase Candidato
	*/
	class Candidato
	{
		private $idCandidato;
		private $idPartido;
	    private $idTipoCandidato;
	    private $idPersona;

	    
	    public function getidCandidato()
	    {
	    	return $this->idCandidato;
	    }
	    public function getidPartido()
		{
			return $this->idPartido;
		}
		public function getidTipoCandito()
		{
			return $this->idTipoCandidato;
		}
		public function getidPersona()
		{
			return $this->idPersona;
		}
	}

 ?>