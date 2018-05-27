<?php

class BoletaController extends ControladorBase
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new Boleta();
	}


	public function boletaView()
	{
		require_once 'app/view/plantillas/header.php';
		require_once 'app/view/plantillas/headerBarPersona.php';
		require_once 'app/view/Persona/BoletaView.php';
		$this->model->getBoleta();
		require_once 'app/view/Persona/BoletaFooter.php';
		require_once 'app/view/plantillas/footer.php';
	}


	// Método para recolectar datos para papeleta de votos
	public function getBoleta()
	{
		$resultado = $this->model->getPapeleta();

		echo $resultado;
	}

}