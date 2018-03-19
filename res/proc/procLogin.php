<?php
	
	include '../clases/Usuario.php';

	$usuario = new Usuario();
	$enc	 = new Enc();

	$respuesta = 0;

	if(isset($_POST["user"]) && isset($_POST["pass"]))
	{
		if(!empty($_POST["user"]) && !empty($_POST["pass"]))
		{
			$user = $_POST["user"];
			$pass = $_POST["pass"];


			$consulta = $usuario->Login($user, $pass);

			$respuesta = $consulta;
		}
		else
		{
			$respuesta = 3;
		}
	}
	else
	{
		$respuesta = 3;
	}

	echo $respuesta;