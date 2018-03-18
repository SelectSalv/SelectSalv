<?php
	
	include '../clases/Usuario.php';
	include 'crypt.php';

	$usuario = new Usuario();
	$enc	 = new Enc();

	$respuesta = 0;

	if(isset($_POST["user"]) && isset($_POST["pass"]))
	{
		if(!empty($_POST["user"]) && !empty($_POST["pass"]))
		{
			$user = $_POST["user"];
			$pass = $_POST["pass"];

			$userEnc = $enc->s_Encrypt($user);
			$passEnc = sha1($pass);

			$consulta = $usuario->Login($userEnc, $passEnc);

			if(!$consulta)
			{
				$respuesta = 2; 
			}
			else 
			{
				$respuesta = 1;
			}
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