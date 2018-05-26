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
					$nombre=$bandera['name'];
					$ruta=$bandera['tmp_name'];
					$destino="res/img/partidos".$nombre;
					//$rutaDesatino="../../res/img/";
<<<<<<< HEAD
				//EJECUNTANDO EL METODO PARA INSERTAR LA BANDERA
				

				$this->model->setNombrePartido($nombre);
				$this->model->setEstado(1);
				$info =$this->model->registrarPartido($destino);
=======
				//EJECUNTANDO EL METODO PARA INSERTAR LA BANDERa

				$this->model->setNombrePartido($nombre);
				$this->model->setEstado(1);
				$info =$this->model->registrarPartido($ruta);
>>>>>>> 329225754e407f81359f3a8293e4c06d24019482

				if($info == 1)
				{
				 copy($ruta,$destino);
				 echo "Imagen subida Correctamente";
				}
				else
				{

					echo "no se pudo guardar la imagen";
				}

			}
			else
			{
				echo "lamentablemente lo que usted intenta insertar no es una imagen";
			}

	} 
}
 ?>