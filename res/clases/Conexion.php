<?php

include 'Credenciales.php';
class Conexion{

	protected $con;

	public function Conectar()
	{
		$this->con = new mysqli(serverName, dbUser, dbPassword, dbName);

		return $this->con;
	}

	public function Desconectar()
	{
		$this->$con->close();
	}

	public function Ejecutar($sql)
	{
		$exe = $this->Conectar()->query($sql);
		$this->Desconectar();
		return $exe;
	}
}