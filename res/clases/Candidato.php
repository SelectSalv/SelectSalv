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
	    function getidCandidato()
	    {
	    	return $this->idCandidato;
	    }
	    function getidPartido()
		{
			return $this->idPartido;
		}
		function getidTipoCandito()
		{
			return $this->idTipoCandidato;
		}
		function getidPersona()
		{
			return $this->idPersona;
		}
	}

 ?>