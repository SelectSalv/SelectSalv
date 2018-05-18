<?php 

	/**
	* Nombre de la Clase: CentroVotacion
	* Autor: Michelle Urbina
	*/
	class CentroVotacion extends ModeloBase
	{
		private $idCentro;
    	private $nomCentro ;
    	private $idMunicipio;
		
		//MÉTODO INICIALIZADOR CLASE CENTROVOTACION	
    	public function __construct()
    	{
    		parent::__construct();
    	}

		// REFACTORIZACIÓN DE PROPIEDADES CLASE CENTROVOTACION

    	# Método GET para idCentro
		public function getIdCentro()
		{
			return $this->idCentro;
		}

		# Métodos GET y SET para nomCentro
		public function getNomCentro()
		{
			return $this->nomCentro;
		}
		public function setNomCentro($nom)
		{
			$this->nomCentro = $nom;
		}

		# Métodos GET y SET para idMunicipio
		public function getIdMunicipio()
		{
			return $this->idMunicipio;
		}
		public function setIdMunicipio($id)
		{
			$this->idMunicipio = $id;
		}
		
	}
 ?>