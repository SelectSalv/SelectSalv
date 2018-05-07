<?php

class UsuarioController extends ControladorBase
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new Usuario();
	}

	public function login()
	{
		$datos = $_REQUEST["datos"];

		$datos = json_decode($datos);

		$this->model->setNomUsuario($datos[0]->value);
		$this->model->setPassUsuario($datos[1]->value);

		$res = $this->model->login();

		echo $res;
	}

}