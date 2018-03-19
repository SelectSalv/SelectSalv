<?php  

include 'Conexion.php';
include '../proc/crypt.php';

class Usuario extends Conexion {
	public $idUsuario;
	public $nomUsuario;
	public $passUsuario;
	public $rolUsuario;

	public function Login($nom, $pass)
	{
		$enc = new Enc();
		$this->nomUsuario  = $enc->s_Encrypt($nom);
		$this->passUsuario = sha1($pass);

		$_query = "call p_loginUsuario('".$this->nomUsuario."', '".$this->passUsuario."')";

		$resultado = $this->Conectar()->query($_query);

		if(!$resultado)
		{
			return 2;
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
			}
		}
	}
}