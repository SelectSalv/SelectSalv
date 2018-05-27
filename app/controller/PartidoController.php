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
					$nombreBandera=$bandera['name'];
					$ruta=$bandera['tmp_name'];
					$destino="res/img/partidos/".$nombreBandera;
					//$rutaDesatino="../../res/img/";


				$this->model->setNombrePartido($nombre);
				$this->model->setEstado(1);
				$info =$this->model->registrarPartido($destino);


				if($info == 1)
				{
				 move_uploaded_file($bandera["tmp_name"], $destino);
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

	public function getPartidos()
	{
		$datos=$this->model->mostrarPartidos();
		echo $datos;

	}

	public function getInformationPartido()
	{

		$datos=$_POST['idPartido'];

		$data=json_decode($datos);

		$info=$this->model->getInformation($data);

		echo $info;

	}


	public function modificarPartido()
	{
		//OBTENIENDO LOS DATOS 
		$idPartido=$_POST['idPartidoEditar'];
		$nombre=$_POST['nomPartido'];
		$bandera=$_FILES['bandera'];
		

		$nomBandera=$bandera['name'];
		

		if($bandera['name']==""){

			$destino=null;
			$this->model->setIdPartido($idPartido);
			$this->model->setNombrePartido($nombre);
			$this->model->setEstado(1);

			$resp= $this->model->modificarPartido($destino);

			
		}
		else if(!empty($bandera))
		{
			$destino="res/img/partidos/".$nomBandera;
			$this->model->setIdPartido($idPartido);
			$this->model->setNombrePartido($nombre);
			$this->model->setEstado(1);
			
			$resp= $this->model->modificarPartido($destino);
			if($resp=="Excelente")
			{
				move_uploaded_file($bandera['tmp_name'], $destino);
			}

			


		}

		echo $resp;


	}


	public function eliminarPartido()
	{

			$datos=$_POST['idPartido'];
			$data= json_decode($datos);

			$info=$this->model->eliminarPartido($data, 0);
			echo $info;

	}
}
 ?>