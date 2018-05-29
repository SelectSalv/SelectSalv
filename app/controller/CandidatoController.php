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
	public function boletaView()
	{
		require_once 'app/view/plantillas/header.php';
		require_once 'app/view/plantillas/headerBarCandidato.php';
		require_once 'app/view/Candidato/BoletaView.php';
		require_once 'app/view/plantillas/footer.php';
	}

	# Acciones Lógicas

	// Método para obtener Datos de persona por id
	public function getCandidato()
	{
		$datos = $_POST['idCandidato'];

		$datos = json_decode($datos);

		$resultado = $this->model->getCandidatoId($datos);

		echo $resultado;
	}

	// Método para obtener Datos de Candidato por DUI
	public function ingresarDui()
	{
		$datos = $_POST["duiVotar"];

		$this->model->setDui($datos);
		$resultado = $this->model->ingresarDui();


		echo $resultado;
	}

	// Método para obterner Candidato en formato JSON
	public function getJSON()
	{
		$datos = $this->model->getCandidatoJSON();
		
		echo $datos;
	}


	// Metodo para registrar Candidato
	public function registrarCandidato()
	{

		$idPersona=$_POST['dui'];
		$idPartido=$_POST['partido'];
		$idTipoCandidato=$_POST['TipoCandidato'];
		$foto=$_FILES['candidato'];
		$estado=1;



				//validando que sea una imagen
			if($foto["type"]=="image/jpg" || $foto["type"]=="image/jpeg" || $foto["type"]=="image/png")
			{
				//OBTENIENDO LA RUTA
					$nombreFoto=$foto['name'];
					$ruta=$foto['tmp_name'];
					$destino="res/img/candidatos/".$nombreFoto;
					//$rutaDesatino="../../res/img/";


				$this->model->setIdPersona($idPersona);
				$this->model->setIdPartido($idPartido);
				$this->model->setIdTipoCandidato($idTipoCandidato);
				$info =$this->model->regCandidato($estado, $destino);


				if($info == "registrado")
				{
				 move_uploaded_file($foto["tmp_name"], $destino);
				 echo "El Candidato con numero de DUI ".$idPersona." fue registrado Correctamente";
				}
				else if($info=="dui")
				{

					echo "AL PARECER YA SE REGISTRÓ UN CANDIDATO CON ESTE NUMERO DE DUI";
				}
				else if ($info=="tipo") {
					echo "YA SE ENCUENTRA ALGUIEN REGISTRADO COMO CANDIDATO CON ESTE PARTIDO Y/O TIPO ";
				}

			}
			else
			{
				echo "lamentablemente lo que usted intenta insertar no es una imagen";
			}

	}

	// Método para editar datos de Candidato
	public function editarCandidato()
	{
		$idCandidato=$_POST['idCandidato'];
		$idPersona=$_POST['dui'];
		$idPartido=$_POST['partido'];
		$idTipoCandidato=$_POST['TipoCandidato'];
		$foto=$_FILES['candidato'];

		
		
		$nomFoto=$foto['name'];


            if($foto['name']==""){

			$destino=null;
			 $this->model->setIdCandidato($idCandidato);
			 $this->model->setIdPersona($idPersona);
			 $this->model->setIdPartido($idPartido);
			 $this->model->setIdTipoCandidato($idTipoCandidato);

			$resp= $this->model->modCandidato($destino);

			
		}
		else if(!empty($foto))
		{
			$destino="res/img/candidatos/".$nomFoto;
			    $this->model->setIdCandidato($idCandidato);
			    $this->model->setIdPersona($idPersona);
				$this->model->setIdPartido($idPartido);
				$this->model->setIdTipoCandidato($idTipoCandidato);

			$resp=$this->model->modCandidato($destino);
			
			
			if($resp=="Excelente")
			{
				move_uploaded_file($foto['tmp_name'], $destino);

				echo "Candidato Modificado Correctamente";
			}
			else if($resp=="error")
			{
				echo "Error al modificar";
			}

			


		}
			


	}

	// Método para eliminar Candidato
	public function eliminarCandidato()
	{
		$datos=$_POST['idCandidato'];
			$data= json_decode($datos);

			$this->model->setIdCandidato($data);
			$info=$this->model->eliminarCandidato();
			if ($info=="ok") {
			
				$resp="Registro Eliminado Correctamente";
			}
			else
			{
				$resp="El registro no se pudo eliminar";
			}
			
			echo $resp;


	}


	//METODO PARA LISTAR CANDIDATOS
	public function getCandidatos()
	{

		$info=$this->model->getCandidatos();

		echo $info;
	}

	//FUNCION PARA OBTENER LOS DATOS DEL CANDIDATO
	public function getInformation()
	{

			$datos=$_POST['idCandidato'];
			$data=json_encode($datos);

			$resp=$this->model->getInformation($data);
		
			
			echo $resp;




	}


	public function getAllPartido()
	{

		$datos=$this->model->getAllPartido();
		 echo $datos;

	}

	public function getAllTipo()
	{

		$datos=$this->model->getAllTipo();
		echo $datos;
	}

}
 
