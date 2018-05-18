<?php 
	
	/**
    * Nombre de la Clase: Jrv
    * Autor: Michelle Urbina
    */
	class JRV extends ModeloBase
	{
		private $idJrv; 
    	private $numJrv; 
    	private $idCentro;

    	public function __construct()
    	{
    		parent:: __construct();
    	}
		
		public function getIdJrv()
		{
			return $this->idJrv;
		}
		public function getNumJrv()
		{
			return $this->numJrv;
		}
		public function getIdCentro()
		{
			return $this->idCentro;
		}

	}

 ?>