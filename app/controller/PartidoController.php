<?php 
require_once 'app/model/Partido.php';
class PartidoController extends ControladorBase
{
	
	function __construct()
	{
		parent:: __construct();
		$this->model = new Partido();
	}

	# Métodos para vistas
	public function partidoView()
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
		require_once 'app/view/Partido/PartidoView.php';
		require_once 'app/view/plantillas/footer.php';
	}

	public function registrarPartido()
	{

		
			$nombre=$_POST['nomPartido'];
			$bandera=$_FILES['bandera'];


				//validando que sea una imagen
			if($bandera["type"]=="image/jpg" || $bandera["type"]=="image/jpeg" || $bandera["type"]=="image/png")
			{
				//OBTENIENDO LA RUTA
					$ruta="controller/".$bandera["name"];
					//$rutaDesatino="../../res/img/";
				//EJECUNTANDO EL METODO PARA INSERTAR LA BANDERA
				$objPartido=new Partido();

				$objPartido->setNombrePartido($nombre);
				$objPartido->setEstado(1);
				$info =$objPartido->registrarPartido($ruta);

				if($info==1)
				{
				 move_uploaded_file($bandera["tmp_name"], $ruta);
				 echo "Imagen subida Correctamente";
				}
				else
				{
					echo "Problema al insertar imagen";
				}

			}
			else
			{
				echo "lamentablemente lo que usted intenta insertar no es una imagen";
			}


			

	} 
}
 ?>