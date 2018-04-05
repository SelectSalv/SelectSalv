<?php 
include 'Conexion.php'; 

class Persona extends Conexion{
	public $idPersona;
	public $dui;
	public $nomPersona;
	public $apePersona;
	public $fechaNac;
	public $fechaVenc;
	public $profesion;
	public $direccion;
	public $estadoCivil;
	public $estadoVotacion;
	public $idMunicipio;

	public function registrarPersona($dui, $nom, $ape, $fechanac, $fechavenc, $prof, $direc, $estado, $estadoVot $municipio)
	{
		$this->dui = $dui;
		$this->nomPersona = $nom;
		$this->apePersona = $ape;
		$this->fechaNac = $fechanac;
		$this->fechaVenc = $fechavenc;
		$this->profesion = $prof;
		$this->direccion = $direc;
		$this->estadoCivil = $estado;
		$this->estadoVotacion = $estadoVot;
		$this->idMunicipio = $municipio;

		$_query = "call p_RegPersona()";
		$resultado = $this->Conectar->query($_query);

		return $resultado;
	}

	public function obtenerPersona($dui)
	{
		$this->dui = $dui;
		$_query = "call p_obtenerPersona('".$this->dui."')";

		$resultado = $this->Conectar()->query($_query);

		return $resultado;
	}
}