<?php 
/**
* 
*/
class DetalleVotoController extends ControladorBase
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function DetallevotoView()
	{	if(($_SESSION["rol"] == "Desarrollador") || ($_SESSION["rol"] == "
		r			{
equire_once 'app/view/plantillas/header.php';
		require_once 'app/view/plantillas/headerBarUsuario.php';
	Administrador"))
				require_once 'app/view/plantillas/menuCompleto.php';
			}
			else{
				require_once 'app/view/plantillas/menu.php';
			}

		require_once 'app/view/plantillas/footer.php';
	}
}
 ?>