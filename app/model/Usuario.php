<?php  

include 'app/plugs/crypt.php';

class Usuario extends ModeloBase {
	private $idUsuario;
	private $nomUsuario;
	private $passUsuario;
	private $rolUsuario;

 	public function __construct()
 	{
 		parent::__construct();
 	}

 	 public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getNomUsuario()
    {
        return $this->nomUsuario;
    }

    public function setNomUsuario($nomUsuario)
    {
        $this->nomUsuario = $nomUsuario;

        return $this;
    }

    public function getPassUsuario()
    {
        return $this->passUsuario;
    }

    public function setPassUsuario($passUsuario)
    {
        $this->passUsuario = $passUsuario;

        return $this;
    }


    public function getRolUsuario()
    {
        return $this->rolUsuario;
    }

    public function setRolUsuario($rolUsuario)
    {
        $this->rolUsuario = $rolUsuario;

        return $this;
    }
	

	# MÉTODO PARA LOGUEAR USUARIO
	public function Login()
	{

		$enc = new Enc();

		$pass = sha1($this->passUsuario);

		$this->nomUsuario = $enc->s_Encrypt($this->nomUsuario);

		$_query = "call p_loginUsuario('".$this->nomUsuario."', '".$pass."')";

		$resultado = $this->con->conectar()->query($_query);

		if(!$resultado)
		{
			$data["resultado"] = 3;
		}
		else
		{
			$n_filas = $resultado->num_rows;
			if($n_filas == 1)
			{
				$fila = $resultado->fetch_assoc();
				$_SESSION["idUsuario"] = $fila["idUsuario"];
				$_SESSION["nomUsuario"] = $enc->s_Decrypt($fila["nomUsuario"]);
				$_SESSION["rol"] = $fila["descRol"];

				$data["resultado"] = 1;
			} else if($n_filas < 1)
			{
				$data["resultado"] = 2;
			}
		}

		return json_encode($data);
	}

	# MÉTODO PARA REGISTRAR USUARIOS
	public function registrar()
	{
		$enc = new Enc();

		$this->nomUsuario = $enc->s_Encrypt($this->nomUsuario);
		$this->passUsuario = sha1($this->passUsuario);

		$_query = "call p_RegUsuario('".$this->nomUsuario."', '".$this->passUsuario."', '".$this->rolUsuario."', ".$_SESSION["idUsuario"].");";

		$resultado = $this->con->conectar()->query($_query);

		$data = array();

		if ($resultado) {

            $data['estado'] = true;
            $data['descripcion'] = "Usuario Ingresados Correctamente";
        }else{
             $data['estado'] = false;
             $data['descripcion'] = "Error al ingresar datos ".$this->con->conectar()->error;
        }
            return json_encode($data);
	}

	# MÉTODO PARA OBTENER TODOS LOS USUARIOS
	public function getUsersJSON()
	{
		$enc = new Enc();

		$_query = "select * from v_Usuarios";

		$resultado = $this->con->conectar()->query($_query);

		$datos = "";

		while($fila = $resultado->fetch_assoc())
		{
			//Inicializacion de botones
		    $mas = null;
		    $modificar = null;
		    $eliminar = null;

			if(($_SESSION["rol"] == "Desarrollador") || ($_SESSION["rol"] == "Administrador"))
			{
				$modificar = '<button id=\"'.$fila["idUsuario"].'\" class=\"btn btn-info btnModificar btn-raised bmd-btn-icon\"><i class=\"material-icons\">edit</i></button>';

				$eliminar = '<button id=\"'.$fila["idUsuario"].'\"  class=\"btn btn-danger btnEliminar btn-raised bmd-btn-icon\"><i class=\"material-icons\">clear</i></button>';
			}
			
			if($fila["estado"] == 1)
			{
				$datos .= ' {
								"idUsuario": "'.$fila["idUsuario"].'",
								"Nombre de Usuario": "'.$enc->s_Decrypt($fila["nomUsuario"]).'",
								"Permisos": "'.$fila["descRol"].'" ,
								"Acciones": "'.$modificar.' '.$eliminar.'"	
							},'; 
			}

			
		}
		$datos = substr($datos,0, strlen($datos) - 1);
		return '{"data" : ['.$datos.']}';
	}

	public function getTransacciones()
	{
		$enc = new Enc();

		$_query = "select * from v_Transacciones";

		$resultado = $this->con->conectar()->query($_query);

		$datos = "";

		while($fila = $resultado->fetch_assoc())
		{

			$fecha = date_create($fila["fecha"]);
			$datos .= ' {
							"id": "'.$fila["id"].'",
							"Nombre de Usuario": "'.$enc->s_Decrypt($fila["nomUsuario"]).'",
							"Permisos del Usuario": "'.$fila["descRol"].'" ,
							"Tipo de Transaccion": "'.$fila["descTransaccion"].'" ,
							"Fecha": "'.date_format($fecha, "d/m/Y").'" ,
							"Hora": "'.$fila["hora"].'"
						},'; 

		}
		$datos = substr($datos,0, strlen($datos) - 1);
		return '{"data" : ['.$datos.']}';
	}

	// MÉTODO PARA OBTENER LOS DATOS DE UN USUARIO POR SU ID
	public function getUsuarioId($id)
	{
		$enc = new Enc();

		$_query = "call p_obtenerUsuarioId(".$id.")";

		$resultado = $this->con->conectar()->query($_query);

		$datos = $resultado->fetch_assoc();

		$datosUsuario = array();

		$datosUsuario["nomUsuarioEditar"] = $enc->s_Decrypt($datos["nomUsuario"]);
		$datosUsuario["codRolEditar"] = $datos["codRol"];

		return json_encode($datosUsuario);
	}


	// Método para comprobar disponibilidad de nombre de Usuario
	public function compNomUsuario()
	{
		$enc = new Enc();

		$_query = "select * from usuario where nomUsuario = '".$enc->s_Encrypt($this->nomUsuario)."'";
		$resultado = $this->con->conectar()->query($_query);

		if($resultado->num_rows == 0)
		{
			$respuesta = "Usuario Disponible";
		}
		else
		{
			$respuesta = "Usuario no Disponible";
		}

		return $respuesta;
	}

	public function compContra($id)
	{
		$_query = "select * from usuario where idUsuario = ".$id." and pass = '".sha1($this->passUsuario)."'";
		$resultado = $this->con->conectar()->query($_query);


		if($resultado)
		{
			if($resultado->num_rows == 1)
			{
				$respuesta = "Contra Correcta";
			}
			else
			{
				$respuesta = "Contra Incorrecta";
			}
		}
		else{
			$respuesta = "error";
		}

		return $respuesta;
	}

	public function editarUsuario($id, $newPass)
	{
		$enc = new Enc();

		$_query = "select * from usuario where pass = '".sha1($this->passUsuario)."' and idUsuario = ".$id;

		$resultado = $this->con->conectar()->query($_query);

		if($resultado->num_rows == 1)
		{
			$_query = "call p_editarUsuario(".$id.", '".$enc->s_Encrypt($this->nomUsuario)."', '".sha1($newPass)."', '".$this->rolUsuario."', ".$_SESSION["idUsuario"].")";

			$resultado = $this->con->conectar()->query($_query);

			if($resultado)
			{
				$respuesta = "Cambios Guardados";
			}
			else
			{
				$respuesta = "Error";
			}
		}
		else
		{
			$respuesta = "Contra Incorrecta";
		}

		return $respuesta;
	}
}