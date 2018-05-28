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
				else
				{

					echo "Ocurrió un error al guardar el candidato";
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
		$datos = $_POST["datos"];

		$datos = json_decode($datos);

		$this->model->setDui($datos[0]->value);
		$this->model->setNomCandidato($datos[1]->value);
		$this->model->setApeCandidato($datos[2]->value);
		$this->model->setGenero($datos[3]->value);
		$this->model->setEstadoCivil($datos[4]->value);
		$this->model->setFechaNac($datos[5]->value);
		$this->model->setFechaVenc($datos[6]->value);
		$this->model->setProfesion($datos[7]->value);
		$this->model->setIdMunicipio($datos[8]->value);
		$this->model->setDireccion($datos[9]->value);

		$id = $datos[10]->value;

		$resultado = $this->model->editarCandidato($id);

		echo $resultado;
	}

	// Método para eliminar Candidato
	public function eliminarCandidato()
	{
		$id = $_POST["idCandidato"];

		$resultado = $this->model->eliminarCandidato($id);

		echo $resultado;
	}


	//METODO PARA LISTAR CANDIDATOS
	public function getCandidatos()
	{

		$info=$this->model->getCandidatos();

		echo $info;
	}

}
 
