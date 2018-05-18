<?php 

/**
* Nombre de la clase: TipoCandidato
* Autor : Carlos Campos
*/
class TipoCandidato extends ModeloBase
{
	
	private $idTipoCandidato;
	private $tipoCandidato;

	function __construct()
	{
		parent:: __construct();	
	}

	#Metodo Get del id de candidato

	public function getIdTipoCandidato()
	{
		return $this->idTipoCandidato;
	}

	#metodos get y set del tipo de candidato
	public function getTipoCandidato()
	{
		return $this->tipoCandidato;
	}

	public function setTipoCandidato($tipoCandidato)
	{
		$this->tipoCandidato=$tipoCandidato;
	}
}


 ?>