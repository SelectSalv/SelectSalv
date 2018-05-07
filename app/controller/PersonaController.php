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

	public function getJSON()
	{
		$datos = $this->model->getPadronJSON();
		return $datos;
	}

	public function registrarPersona()
	{

		$decode = $_POST["datos"];

		$decode = json_decode($decode);

		$this->model->setDui($decode[0]->value);
		$this->model->setNomPersona($decode[1]->value);
		$this->model->setApePersona($decode[2]->value);
		$this->model->setGenero($decode[3]->value);
		$this->model->setEstadoCivil($decode[4]->value);
		$this->model->setFechaNac($decode[5]->value);
		$this->model->setFechaVenc($decode[6]->value);
		$this->model->setProfesion($decode[7]->value);
		$this->model->setIdMunicipio($decode[8]->value);
		$this->model->setDireccion($decode[9]->value);
		$resultado =  $this->model->registrarPersona();	

		echo $resultado;
	}

}