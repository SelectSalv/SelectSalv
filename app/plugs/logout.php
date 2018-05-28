<?php 

session_start();

if(isset($_SESSION["idUsuario"]))
{
	if(!empty($_SESSION["idUsuario"]))
	{
		session_destroy();

		header("Location: ../../index.php");
	} else{
		echo "<script type='text/javascript'>";
	    echo "window.history.back(-1)";
	    echo "</script>";
	}
} else{
    echo "<script type='text/javascript'>";
    echo "window.history.back(-1)";
    echo "</script>";
}

if(isset($_SESSION["duiPersona"]))
{
	if(!empty($_SESSION["duiPersona"]))
	{

		$idUsuario = $_SESSION["idUsuario"];
		$nomUsuario = $_SESSION["nomUsuario"];
		$rol = $_SESSION["rol"];

		session_destroy();
		session_start();

		$_SESSION["idUsuario"] = $idUsuario;
		$_SESSION["nomUsuario"] = $nomUsuario;
		$_SESSION["rol"] = $rol;


		header("Location: ../../index.php");
	} else{
		echo "<script type='text/javascript'>";
	    echo "window.history.back(-1)";
	    echo "</script>";
	}
} else{
    echo "<script type='text/javascript'>";
    echo "window.history.back(-1)";
    echo "</script>";
}