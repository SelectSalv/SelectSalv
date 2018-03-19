<?php

include '../proc/crypt.php';

class Plantilla{

	public function compInicioSesion()
	{
		session_start();
		if(isset($_SESSION["idUsuario"]))
		{
			if(empty($_SESSION["idUsuario"]))
			{
				header("Location: ../../index.php");
				
			} 
		} else {
			header("Location: ../../index.php");
			
		}
	}
}