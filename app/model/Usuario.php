<?php  

// include 'Conexion.php';
// include '../proc/crypt.php';

class Usuario extends ModeloBase {
	private $idUsuario;
	private $nomUsuario;
	private $passUsuario;
	private $rolUsuario;

 	public function __construct()
 	{
 		parent::__construct();
 	}

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
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
		$pass = sha1($this->passUsuario);

		$_query = "call p_loginUsuario('".$this->nomUsuario."', '".$pass."')";

		$resultado = $this->con->conectar()->query($_query);

		if(!$resultado)
		{
			return 4;
		}
		else
		{
			$n_filas = $resultado->num_rows;
			if($n_filas == 1)
			{
				$fila = $resultado->fetch_assoc();
				session_start();
				$_SESSION["idUsuario"] = $fila["idUsuario"];
				$_SESSION["nomUsuario"] = $fila["nomUsuario"];
				$_SESSION["rol"] = $fila["descRol"];

				return 1;
			} else if($n_filas < 1)
			{
				return 2;
			}
		}
	}

}