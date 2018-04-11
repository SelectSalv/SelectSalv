<?php 
	/**
	* clase de la junta receptora de votos
	*/
	class JRV
	{
		private $idJrv; 
    	private $numJrv; 
    	private $idCentro;
		
		public function getidJRV()
		{
			return $this->idJrv;
		}
		public function getnumJRV()
		{
			return $this->numJrv;
		}
		public function getidCentro()
		{
			return $this->idCentro;
		}

	}

 ?>