<?php 

if(isset($_POST["dui"]))
{
	if(!empty($_POST["dui"]))
	{
		$dui = $_POST["dui"];

		setcookie("duiVotante", $dui, time() + (60 * 10), "/");
	}
}

if(!empty($_COOKIE["duiVotante"]))
{
	echo 1;
}
else{
	echo 0;
}