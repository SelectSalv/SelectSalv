<?php  

include 'Conexion.php';

class Usuario extends Conexion {
	public $idUsuario;
	public $nomUsuario;
	public $passUsuario;
	public $rolUsuario;

	public function Login($nom, $pass)
	{
		$this->nomUsuario  = $nom;
		$this->passUsuario = $pass;

		$_query = "call p_loginUsuario(".$this->nomUsuario.", ".$this->passUsuario.")";

		$resultado = $this->Conectar()->query($_query);

		if(!$resultado)
		{
			return 'nel';
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

				return fila;
			}
		}
	}
}