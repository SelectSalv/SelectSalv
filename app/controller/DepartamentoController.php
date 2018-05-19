<?php 
/**
* 
*/
class DepartamentoController extends ControladorBase
{
	
	function __construct()
	{
		parent:: __construct();
	}

	# Métodos para vistas
	public function departamentoView()
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

		require_once 'app/view/plantillas/footer.php';
	} 
}
 ?>