<?php

include 'Credenciales.php';
class Conexion{

	protected $con;

	public function Conectar()
	{
		$con = new mysqli(serverName, dbUser, dbPassword, dbName);

		return $con;
	}

	public function Ejecutar($sql)
	{
		$exe = $this->Conectar()->query($sql);

		return $exe;
	}
}