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

}