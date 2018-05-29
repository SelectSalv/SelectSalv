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

	// Método para editar datos de Usuario
	public function editarUsuario()
	{
		$datos = $_POST["datos"];

		$datos = json_decode($datos);

		$this->model->setNomUsuario($datos[0]->value);
		$this->model->setPassUsuario($datos[1]->value);
		$this->model->setRolUsuario($datos[3]->value);

		$id = $datos[4]->value;
		$newPass = $datos[2]->value;

		$resultado = $this->model->editarUsuario($id, $newPass);

		echo $resultado;
	}

	// Método para comprobar contraseña de usuario
	public function compContra()
	{
		$contra = $_POST["contra"];
		$id = $_POST["id"];

		$this->model->setPassUsuario($contra);

		$resultado = $this->model->compContra($id);

		echo $resultado;
	}

	// Método para comprobar disponibilidad de nombre de Usuario
	public function compNomUsuario()
	{
		$nom = $_POST["nombre"];

		$this->model->setNomUsuario($nom);

		$resultado = $this->model->compNomUsuario();

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

	// Método para eliminar Usuario
	public function eliminarUsuario() 
	{
		$idUsuario = $_POST["idUsuario"];

		$resultado = $this->model->eliminarUsuario($idUsuario);

		echo $resultado;
	}

	public function principales()
	{
		$resultado = $this->model->partidosPrincipales();

		var_dump($resultado);
	}
	public function buildDashboard()
	{
		$graficoPrincipal = $this->model->graficoPrincipal();
		$partidosPrincipales = $this->model->partidosPrincipales();

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
}
