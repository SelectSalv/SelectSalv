<?php

class PersonaController extends ControladorBase
{

	public function __construct()
	{
		parent::__construct();
		$this->model = new Persona();
	}
 
	# Acciones para Vistas

	public function padron()
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
		require_once 'app/view/Persona/PadronView.php';
		require_once 'app/view/plantillas/footer.php';
	}

	public function boletaView()
	{
		require_once 'app/view/plantillas/header.php';
		require_once 'app/view/plantillas/headerBarPersona.php';
		require_once 'app/view/Persona/BoletaView.php';
		require_once 'app/view/plantillas/footer.php';
	}

	# Acciones Lógicas


	// Método para Comprobar disponibilidad de DUI
	public function compDui()
	{
		$this->model->setDui($_POST["ndui"]);
		$resultado = $this->model->compDUI();

		echo $resultado;
	}

	// Método para obtener Datos de persona por id
	public function getPersona()
	{
		$datos = $_POST['idUsuario'];

		$datos = json_decode($datos);

		$resultado = $this->model->getPersonaId($datos);

		echo $resultado;
	}

	// Método para obtener Datos de persona por DUI
	public function ingresarDui()
	{
		$datos = $_POST["dui"];

		$resultado = $this->model->getPersonaDui($datos);

		if($resultado)
		{
			$fila = $resultado->fetch_assoc();

			$_SESSION["duiPersona"] = $datos;
			$_SESSION["apePersona"] = $fila["apePersona"];
			$_SESSION["nomPersona"] = $fila["nomPersona"];
			$_SESSION["municipioPersona"] = $fila["nomMunicipio"];
			$_SESSION["departamentoPersona"] = $fila["nomDepartamento"];
		}

	}

	// Método para obterner padron en formato JSON
	public function getJSON()
	{
		$datos = $this->model->getPadronJSON();
		
		echo $datos;
	}


	// Metodo para registrar Persona
	public function registrarPersona()
	{

		$datos = $_POST["datos"];

		$datos = json_decode($datos);

		$this->model->setDui($datos[0]->value);
		$this->model->setNomPersona($datos[1]->value);
		$this->model->setApePersona($datos[2]->value);
		$this->model->setGenero($datos[3]->value);
		$this->model->setEstadoCivil($datos[4]->value);
		$this->model->setFechaNac($datos[5]->value);
		$this->model->setFechaVenc($datos[6]->value);
		$this->model->setProfesion($datos[7]->value);
		$this->model->setIdMunicipio($datos[8]->value);
		$this->model->setDireccion($datos[9]->value);
		$resultado =  $this->model->registrarPersona();	

		echo $resultado;
	}

	// Método para editar datos de Persona
	public function editarPersona()
	{
		$datos = $_POST["datos"];

		$datos = json_decode($datos);

		$this->model->setDui($datos[0]->value);
		$this->model->setNomPersona($datos[1]->value);
		$this->model->setApePersona($datos[2]->value);
		$this->model->setGenero($datos[3]->value);
		$this->model->setEstadoCivil($datos[4]->value);
		$this->model->setFechaNac($datos[5]->value);
		$this->model->setFechaVenc($datos[6]->value);
		$this->model->setProfesion($datos[7]->value);
		$this->model->setIdMunicipio($datos[8]->value);
		$this->model->setDireccion($datos[9]->value);

		$id = $datos[10]->value;

		$resultado = $this->model->editarPersona($id);

		echo $resultado;
	}

	// Método para eliminar Persona
	public function eliminarPersona()
	{
		$id = $_POST["idPersona"];

		$resultado = $this->model->eliminarPersona($id);

		echo $resultado;
	}

}