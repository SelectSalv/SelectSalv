<?php 

	/**
	* clase de centro de votacion
	*/
	class centroVotacion
	{
		private $idCentro;
    	private $nomCentro ;
    	private $idMunicipio;
		
		function getidCentro()
		{
			return $this->idCentro;
		}
		function getnomCentro()
		{
			return $this->nomCentro;
		}
		function getidMunicipio()
		{
			return $this->idMunicipio;
		}
		
	}
 ?>