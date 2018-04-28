<?php 

include '../clases/Persona.php';
$persona = new Persona();

if(isset($_POST["tipo"]))
{
	if($_POST["tipo"] == "compDui")
	{
		$persona->setDui($_POST["dui"]);
		$resultado = $persona->compDUI();

		echo $resultado;
	}

}
else{
	if(isset($_POST["dui"]))
	{
		if(!empty($_POST["dui"]))
		{
			$persona->setDui($_POST["dui"]);
			$persona->setNomPersona($_POST["nomPersona"]);
			$persona->setApePersona($_POST["apellidosPersona"]);
			$persona->setGenero($_POST["generoPersona"]);
			$persona->setEstadoCivil($_POST["estadoCivil"]);
			$persona->setFechaNac($_POST["fechaNacimiento"]);
			$persona->setFechaVenc($_POST["fechaVencimiento"]);
			$persona->setProfesion($_POST["profesion"]);
			$persona->setIdMunicipio($_POST["municipio"]);
			$persona->setDireccion($_POST["direccion"]);
			$resultado =  $persona->registrarPersona();	

			echo $resultado;
		}
	} 
	else{
		header("Location: ../php/regPersona.php");
	}
}

