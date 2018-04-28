<?php  

// include 'Conexion.php';
// include '../proc/crypt.php';

class Usuario {
	private $idUsuario;
	private $nomUsuario;
	private $passUsuario;
	private $rolUsuario;

	# Métodos GET y SET para idUsuario
	public function getIdUsuario()
	{
		return $this->idUsuario;
	}

	# Métodos GET y SET para nomUsuario
	

	# MÉTODO PARA LOGUEAR USUARIO
	public function Login($nom, $pass)
	{
		$enc = new Enc();
		$this->nomUsuario  = $enc->s_Encrypt($nom);
		$this->passUsuario = sha1($pass);

		$_query = "call p_loginUsuario('".$this->nomUsuario."', '".$this->passUsuario."')";

		$resultado = $this->Conectar()->query($_query);

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
				$_SESSION["nomUsuario"] = $enc->s_Decrypt($fila["nomUsuario"]);
				$_SESSION["rol"] = $fila["descRol"];

				return 1;
			} else if($n_filas < 1)
			{
				return 2;
			}
		}
	}
}