<?php 

if(isset($_POST["dui"]))
{
	if(!empty($_POST["dui"]))
	{
		$dui = $_POST["dui"];

		session_start();
		$_SESSION["duiVotante"] = $dui;
	}
}

if(!empty($_SESSION["duiVotante"]))
{
	echo 1;
}
else{
	echo 0;
}