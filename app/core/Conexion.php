<?php

class Conectar
{
	private $driver;
	private $hostName;
	private $dbUser;
	private $dbPass;
	private $dbName;
	private $charset;

	public function __construct()
	{
		$datos = require_once 'config/database.php';

		$this->driver = $datos["driver"];
		$this->hostName = $datos["hostName"];
		$this->dbUser = $datos["dbUser"];
		$this->dbPass = $datos["dbPass"];
		$this->dbName = $datos["dbName"];
		$this->charset = $datos["charset"];
	}

	public function conexion()
	{
		$con = new mysqli($this->hostName, $this->dbUser, $this->dbPass, $this->dbName);

		return $con;
	}
}