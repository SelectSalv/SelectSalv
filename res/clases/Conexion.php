<?php

class Conexion{
	private $serverName = "localhost";
	private $dbUser     = "root";
	private $dbPassword = "";
	private $dbName     = "SelectSalv";

	protected function Conectar()
	{
		$con = new mysqli($this->serverName, $this->dbUser, $this->dbPassword, $this->dbName);

		return $con;
	}

	public function Ejecutar($sql)
	{
		$exe = $this->Conectar()->query($sql);

		return $exe;
	}
}