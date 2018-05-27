<?php

class Partido extends ModeloBase
{

	private	$idPartido; 
	private	$nomPartido;
	private $estado;
	

	public function __construct()
	{
		parent::__construct();
	}

	public function getidPartido()
	{
		return $this->idPartido;
	}
	public function setIdPartido($idPartido)
	{
		$this->idPartido=$idPartido;
	}
	public function getNombrePartido()
	{
		return $this->nomPartido;
	}
	public function setNombrePartido($nomPartido)
	{
		$this->nomPartido=$nomPartido;
	}

	public function getEstado()
	{
		return $this->estado;
	}
	public function setEstado($estado)
	{
		$this->estado=$estado;
	}


	//METODO PARA INSERTAR PARTIDO
	public function registrarPartido($url)
	{

		$sql="INSERT INTO partido values(null,'".$this->nomPartido."', '".$url."', ".$this->estado.")";


		$info = $this->con->conectar()->query($sql);


		if($info)
		{
			$resp=1;
		}
		else
		{
			$resp=0;
			
		}
		return $resp;
	}


	//METODO PARA MOSTRAR PARTIDO
	public function mostrarPartidos()
	{

			//armando la sql
		$sql="SELECT `idPartido`, `nomPartido`,`rutaBandera`,`estado` FROM `partido` WHERE estado=1";

		$resultado = $this->con->conectar()->query($sql);
		$datos = "";

		while ($fila = $resultado->fetch_assoc()) {
		    
		   if($fila["estado"] == 1)
		   {
			   	 //Inicializacion de botones
			    $mas = null;
			    $modificar = null;
			    $eliminar = null;


				$mas = '<button id=\"'.$fila["idPartido"].'\" class=\"btn btn-secondary btnDetalles btn-raised bmd-btn-icon\"><i class=\"material-icons\">more_horiz</i></button>';

				if(($_SESSION["rol"] == "Desarrollador") || ($_SESSION["rol"] == "Administrador"))
				{
					$modificar = '<button id=\"'.$fila["idPartido"].'\" class=\"btn btn-info btnModificar btn-raised bmd-btn-icon\"><i class=\"material-icons\">edit</i></button>';

					$eliminar = '<button id=\"'.$fila["idPartido"].'\"  class=\"btn btn-danger btnEliminar btn-raised bmd-btn-icon\"><i class=\"material-icons\">clear</i></button>';
				}
				
			

			

				$datos .= ' {	"idPartido": "'.$fila["idPartido"].'",
								"nomPartido": "'.$fila["nomPartido"].'",
								"Bandera": "'.$fila["rutaBandera"].'",
								"Acciones": "'.$mas.$modificar.$eliminar.'"
							},';

		   }
		}

		$datos = substr($datos,0, strlen($datos) - 1);
		 return '{"data" : ['.$datos.']}';

     



	}

	public function getInformation($idPartido){

			$sql="SELECT `idPartido`, `nomPartido`,`rutaBandera`,`estado` FROM `partido` WHERE idPartido=".$idPartido." ";
			$respuesta=$this->con->conectar()->query($sql);

			$datos=$respuesta->fetch_assoc();
			return json_encode($datos);


	}

	public function modificarPartido($ruta){

		if($ruta==null){
			$sql="UPDATE partido SET nomPartido='".$this->nomPartido."' WHERE IdPartido=".$this->idPartido."";

			
		}
		else if($ruta!=null)
		{
			$sql="UPDATE partido SET nomPartido='".$this->nomPartido."', rutaBandera='".$ruta."' WHERE IdPartido=".$this
			->idPartido."";
			
		}

		$resp=$this->con->conectar()->query($sql);
		if($resp)
		{
			$info="Excelente";
		}

		return $info;



	}

//ELIMINANDO PARTIDO
	public function eliminarPartido($id, $estado)
	{
			$sql="UPDATE partido SET estado=".$estado." WHERE idPartido=".$id."";
			$info=$this->con->conectar()->query($sql);
			if($info)
			{
				$resp="Partido Eliminado Correctamente";
			}
			else
			{
				$resp="Ocurrió un error a la hora de Elinar el Partido";
			}

			$respuesta=json_encode($resp);
			return $respuesta;

	}


}
