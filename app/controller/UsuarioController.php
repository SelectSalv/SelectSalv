<?php

class UsuarioController extends ControladorBase
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new Usuario();
	}

	# Acciones de Vistas

	public function loginView()
	{}

	public function transacciones()
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
		require_once 'app/view/Usuario/transaccionesView.php';
		require_once 'app/view/plantillas/footer.php';
	}

	public function dashboard()
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
		require_once 'app/view/Usuario/DashboardView.php';
		require_once 'app/view/plantillas/footer.php';
	}


	public function listaUsuarios()
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
		require_once 'app/view/Usuario/crudView.php';
		require_once 'app/view/plantillas/footer.php';
	}

	# Acciones Lógicas

	public function login()
	{
		$datos = $_REQUEST["datos"];

		$datos = json_decode($datos);

		$this->model->setNomUsuario($datos[0]->value);
		$this->model->setPassUsuario($datos[1]->value);

		$res = $this->model->login();

		echo $res;
	}

	public function getJSON()
	{
		$datos = $this->model->getUsersJSON();

		echo $datos;
	}

	public function getTransacciones()
	{
		$datos = $this->model->getTransacciones();

		echo $datos;
	}
	public function registrar()
	{
		$datos = $_REQUEST["datos"];

		$datos = json_decode($datos);

		$this->model->setNomUsuario($datos[0]->value);
		$this->model->setPassUsuario($datos[1]->value);
		$this->model->setRolUsuario($datos[2]->value);

		$resultado = $this->model->registrar();
		
		echo $resultado;
	}

	// Método para obtener Datos de usuario por id
	public function getUsuario()
	{
		$datos = $_POST['idUsuario'];

		$datos = json_decode($datos);

		$resultado = $this->model->getUsuarioId($datos);

		echo $resultado;
	}
}
