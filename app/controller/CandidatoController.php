<?php

class CandidatoController extends ControladorBase
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Candidato();
    }

    # Métodos para vistas

    public function candidatoView()
    {
    	require_once 'app/view/plantillas/header.php';
		require_once 'app/view/plantillas/headerBarUsuario.php';
		if(($_SESSION["rol"] == "Desarrollador") || ($_SESSION["rol"] == "Administrador"))
			{
				require_once 'app/view/plantillas/menuCompleto.php';
			}
			else{
				require_once 'app/view/plantillas/menu.php';
			}
		require_once 'app/view/Candidato/candidatoView.php';
		require_once 'app/view/plantillas/footer.php';
	}
 
}