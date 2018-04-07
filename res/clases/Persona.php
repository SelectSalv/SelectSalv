<?php 
include 'Conexion.php'; 

/**
* Clase Persona
*/

class Persona {

	// PROPIEDADES CLASE PERSONA
	private $idPersona;
	private $dui;
	private $nomPersona;
	private $apePersona;
	private $genero;
	private $fechaNac;
	private $fechaVenc;
	private $profesion;
	private $direccion;
	private $estadoCivil;
	private $estadoVotacion;
	private $idMunicipio;

	protected $con;


	// MÉTODO INICIALIZADOR CLASE PERSONA
	public function Persona()
	{
		$this->con = new Conexion();
	}

	// REFACTORIZACIÓN DE PROPIEDADES CLASE PERSONA

	# Método GET para idPersona
	public function getidPersona()
	{
		return $this->idPersona;
	}

	# Métodos GET y SET para dui
	public function getDui()
	{
		return $this->dui;
	}
	public function setDui($dui)
	{
		$this->dui = $dui;
	}

	# Métodos GET y SET para nomPersona
	public function getNomPersona()
	{
		return $this->nomPersona;
	}
	public function setNomPersona($nom)
	{
		$this->nomPersona = $nom;
	}

	# Métodos GET y SET para apePersona
	public function getApePersona()
	{
		return $this->apePersona;
	}
	public function setApePersona($ape)
	{
		$this->apePersona = $ape;
	}

	# Métodos GET y SET para genero
	public function getGenero()
	{
		return $this->genero;
	}
	public function setGenero($gen)
	{
		$this->genero = $gen; 
	}

	# Métodos GET y SET para fechaNac
	public function getFechaNac()
	{
		return $this->fechaNac;
	}
	public function setFechaNac($fecha)
	{
		$this->fechaNac = $fecha;
	}

	# Métodos GET y SET para fechaVenc
	public function getFechaVenc()
	{
		return $this->fechaVenc;
	}
	public function setFechaVenc($fecha)
	{
		$this->fechaVenc = $fecha;
	}

	# Métodos GET y SET para profesion
	public function getProfesion()
	{
		return $this->profesion;
	}
	public function setProfesion($prof)
	{
		$this->profesion = $prof;
	}

	# Métodos GET y SET para direccion
	public function getDireccion()
	{
		return $this->direccion;
	}
	public function setDireccion($dir)
	{
		$this->direccion = $dir;
	}

	# Métodos GET y SET para estadoCivil
	public function getEstadoCivil()
	{
		return $this->estadoCivil;
	}
	public function setEstadoCivil($estado)
	{
		$this->estadoCivil = $estado;
	}

	# Métodos GET y SET para estadoVotacion
	public function getEstadoVotacion()
	{
		return $this->estadoVotacion;
	}
	public function setEstadoVotacion($estado)
	{
		$this->estadoVotacion = $estado;
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


	// MÉTODO PARA REGISTRAR DATOS DE PERSONA
    public function registrarPersona()
	{

		$_query = "call p_regPersona('".$this->dui."', '".$this->nomPersona."', '".$this->apePersona."', '".$this->genero."', '".$this->fechaNac."', '".$this->fechaVenc."', '".$this->profesion."', '".$this->direccion."', '".$this->estadoCivil."', ".$this->idMunicipio.")";
		$resultado = $this->con->Conectar()->query($_query);

		return $_query;
	}

	// MÉTODO PARA OBTENER DATOS DE PERSONA POR SU N° DE DUI
	public function obtenerPersona()
	{
		$_query = "call p_obtenerPersona('".$this->dui."')";

		$resultado = $this->con->Conectar()->query($_query);

		return $resultado;
	}
} // FIN CLASE PERSONA