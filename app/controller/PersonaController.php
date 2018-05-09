<?php

class PersonaController extends ControladorBase
{

	public function __construct()
	{
		parent::__construct();
		$this->model = new Persona();
	}
 
	public function compDui()
	{
		$this->model->setDui($_POST["ndui"]);
		$resultado = $this->model->compDUI();

		echo $resultado;
	}

	public function getPersona()
	{
		$datos = $_POST['idUsuario'];

		$datos = json_decode($datos);

		$resultado = $this->model->getPersona($datos);

		echo $resultado;
	}

	public function getJSON()
	{
		$datos = $this->model->getPadronJSON();
		
		echo $datos;
	}

	public function registrarPersona()
	{

		$datos = $_POST["datos"];

		$datos = json_decode($datos);

		$this->model->setDui($datos[0]->value);
		$this->model->setNomPersona($datos[1]->value);
		$this->model->setApePersona($datos[2]->value);
		$this->model->setGenero($datos[3]->value);
		$this->model->setEstadoCivil($datos[4]->value);
		$this->model->setFechaNac($datos[5]->value);
		$this->model->setFechaVenc($datos[6]->value);
		$this->model->setProfesion($datos[7]->value);
		$this->model->setIdMunicipio($datos[8]->value);
		$this->model->setDireccion($datos[9]->value);
		$resultado =  $this->model->registrarPersona();	

		echo $resultado;
	}

}