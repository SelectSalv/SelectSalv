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
		$this->model->setNomUsuario($_REQUEST["user"]);
		$this->model->setPassUsuario($_REQUEST["pass"]);

		$resultado = $this->model->login();

		echo $resultado;
	}

}