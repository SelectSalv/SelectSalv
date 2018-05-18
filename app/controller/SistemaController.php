<?php

class SistemaController extends ControladorBase
{

	public function __construct()
	{
		parent::__construct();
		$this->model = new Sistema();
	}

	# Metodos de Vistas

	public function index()
	{
		require_once 'app/view/plantillas/headerIndex.php';
		require_once 'app/view/Sistema/indexView.php';
		require_once 'app/view/plantillas/footer.php';
	}


	// public function
}