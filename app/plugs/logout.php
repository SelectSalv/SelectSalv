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