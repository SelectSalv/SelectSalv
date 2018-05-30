<?php 
	/**
	* Nombre de la Clase: Persona
	* Autor: Jorge Sidgo
	*/
class Persona extends ModeloBase {

	// PROPIEDADES CLASE PERSONA
	private $idPersona;
	private $dui;
	private $nomPersona;
	private $apePersona;
	private $genero;
	private $fechaNac;
	private $fechaVenc;
	private $profesion;
	private $direccion;
	private $estadoCivil;
	private $estadoVotacion;
	private $idMunicipio;


	// MÉTODO INICIALIZADOR CLASE PERSONA
	public function __construct()
	{
		parent::__construct();
	}

	// REFACTORIZACIÓN DE PROPIEDADES CLASE PERSONA

	# Método GET para idPersona
	public function getidPersona()
	{
		return $this->idPersona;
	}

	# Métodos GET y SET para dui
	public function getDui()
	{
		return $this->dui;
	}
	public function setDui($dui)
	{
		$this->dui = $dui;
	}

	# Métodos GET y SET para nomPersona
	public function getNomPersona()
	{
		return $this->nomPersona;
	}
	public function setNomPersona($nom)
	{
		$this->nomPersona = $nom;
	}

	# Métodos GET y SET para apePersona
	public function getApePersona()
	{
		return $this->apePersona;
	}
	public function setApePersona($ape)
	{
		$this->apePersona = $ape;
	}

	# Métodos GET y SET para genero
	public function getGenero()
	{
		return $this->genero;
	}
	public function setGenero($gen)
	{
		$this->genero = $gen; 
	}

	# Métodos GET y SET para fechaNac
	public function getFechaNac()
	{
		return $this->fechaNac;
	}
	public function setFechaNac($fecha)
	{
		$this->fechaNac = $fecha;
	}

	# Métodos GET y SET para fechaVenc
	public function getFechaVenc()
	{
		return $this->fechaVenc;
	}
	public function setFechaVenc($fecha)
	{
		$this->fechaVenc = $fecha;
	}

	# Métodos GET y SET para profesion
	public function getProfesion()
	{
		return $this->profesion;
	}
	public function setProfesion($prof)
	{
		$this->profesion = $prof;
	}

	# Métodos GET y SET para direccion
	public function getDireccion()
	{
		return $this->direccion;
	}
	public function setDireccion($dir)
	{
		$this->direccion = $dir;
	}

	# Métodos GET y SET para estadoCivil
	public function getEstadoCivil()
	{
		return $this->estadoCivil;
	}
	public function setEstadoCivil($estado)
	{
		$this->estadoCivil = $estado;
	}

	# Métodos GET y SET para estadoVotacion
	public function getEstadoVotacion()
	{
		return $this->estadoVotacion;
	}
	public function setEstadoVotacion($estado)
	{
		$this->estadoVotacion = $estado;
	}

	# Métodos GET y SET para idMunicipio
	public function getIdMunicipio()
	{
		return $this->idMunicipio;
	}
	public function setIdMunicipio($id)
	{
		$this->idMunicipio = $id;
	}


	// MÉTODO PARA OBTENER LOS DATOS DE UNA PERSONA POR SU ID

	public function getPersonaId($id)
	{
		$_query = "call p_obtenerPersonaId(".$id.")";

		$resultado = $this->con->conectar()->query($_query);

		$datos = $resultado->fetch_assoc();

		return json_encode($datos);
	}

	// MÉTODO PARA OBTENER DATOS DE PERSONA POR SU N° DE DUI
	public function getPersonaDui()
	{
		$_query = "call p_obtenerPersona('".$this->dui."')";

		$resultado = $this->con->conectar()->query($_query);

		return $resultado;
	}

	public function ingresarDui()
	{
		$_query = "call p_obtenerPersona('".$this->dui."')";

		$resultado = $this->con->conectar()->query($_query);

		if($resultado)
		{
			if($resultado->num_rows == 1)
			{
				$fila = $resultado->fetch_assoc();

				$_SESSION["duiPersona"] = $this->dui;
				$_SESSION["apePersona"] = $fila["apePersona"];
				$_SESSION["nomPersona"] = $fila["nomPersona"];
				$_SESSION["municipioPersona"] = $fila["nomMunicipio"];
				$_SESSION["departamentoPersona"] = $fila["nomDepartamento"];

				$respuesta = "ok";
			}
			else {
				$respuesta = "no registrado";
			}
			
		} else
		{
			$respuesta = "error";
		}

		return $respuesta;
	}

	// MÉTODO PARA COMPROBAR LA EXISTENCIA DE UN N° DE DUI

	public function compDui()
	{
		$_query = "select * from persona where dui = '".$this->dui."'";

		$resultado = $this->con->conectar()->query($_query);

		if($resultado->num_rows == 0)
		{
			$respuesta = "disponible";
		} else
		{
			$respuesta = "usuario registrado";
		}

		return $respuesta;
	}

	public function getPadronJSON()
	{
		$_query = "select * from v_Persona";

		$resultado = $this->con->conectar()->query($_query);
		$datos = "";

		while ($fila = $resultado->fetch_assoc()) {
		    
		   if($fila["estado"] == 1)
		   {
			   	 //Inicializacion de botones
			    $mas = null;
			    $modificar = null;
			    $eliminar = null;


				$mas = '<button id=\"'.$fila["idPersona"].'\" class=\"btn btn-secondary btnDetalles btn-raised bmd-btn-icon\"><i class=\"material-icons\">more_horiz</i></button>';

				if(($_SESSION["rol"] == "Desarrollador") || ($_SESSION["rol"] == "Administrador"))
				{
					$modificar = '<button id=\"'.$fila["idPersona"].'\" class=\"btn btn-info btnModificar btn-raised bmd-btn-icon\"><i class=\"material-icons\">edit</i></button>';

					$eliminar = '<button id=\"'.$fila["idPersona"].'\"  class=\"btn btn-danger btnEliminar btn-raised bmd-btn-icon\"><i class=\"material-icons\">clear</i></button>';
				}
				
				if($fila["estadoVotacion"] == 0 )
				{
					$estadoVotacion = '<i class=\"material-icons\">clear</i>';
				}
				else if($fila["estadoVotacion"] == 1)
				{
					$estadoVotacion = '<i class=\"material-icons\">check</i>';
				}

				$fecha = date_create($fila["fechaNac"]);

				$datos .= ' {	"idPersona": "'.$fila["idPersona"].'",
								"DUI": "'.$fila["dui"].'",
								"Apellidos": "'.$fila["apePersona"].'",
								"Nombres": "'.$fila["nomPersona"].'",
								"JRV": "'.$fila["numJrv"].'",
								"Genero": "'.$fila["descGenero"].'",
								"Fecha": "'.date_format($fecha, "d/m/Y").'",
								"Municipio": "'.$fila["nomMunicipio"].'",
								"Estado": "'.$estadoVotacion.'",
								"Acciones": "'.$mas.$modificar.$eliminar.'"
							},';

		   }
		}

		$datos = substr($datos,0, strlen($datos) - 1);

        return '{"data" : ['.$datos.']}';
	}

	// MÉTODO PARA REGISTRAR PERSONA EXTENDIDO
	public function registrarPersonaExt()
	{
		$_query = "select * from persona where dui = '".$this->dui."'";

		$resultado = $this->con->conectar()->query($_query);

		if($resultado->num_rows == 0)
		{
			$_query = "call p_regPersona('".$this->dui."', '".$this->nomPersona."', '".$this->apePersona."', ".$this->genero.", '".$this->fechaNac."', '".$this->fechaVenc."', '".$this->profesion."', '".$this->direccion."', ".$this->estadoCivil.", ".$this->idMunicipio.", ".$_SESSION["idUsuario"].")";
				$resultado = $this->con->conectar()->query($_query);

				if($resultado)
				{
					$respuesta = "registrado";
				}
				else{
					$respuesta = "error al registrar";
				}

		} elseif($resultado->num_rows > 0){

			$respuesta = "dui registrado";

		}

		return $respuesta;
	} 

	// MÉTODO PARA REGISTRAR DATOS DE PERSONA
    public function registrarPersona()
	{

		$_query = "select * from persona where dui = '".$this->dui."'";

		$resultado = $this->con->conectar()->query($_query);

		if($resultado->num_rows == 0)
		{
			$_query = "call p_regPersona('".$this->dui."', '".$this->nomPersona."', '".$this->apePersona."', ".$this->genero.", '".$this->fechaNac."', '".$this->fechaVenc."', '".$this->profesion."', '".$this->direccion."', ".$this->estadoCivil.", '".$this->idMunicipio."', ".$_SESSION["idUsuario"].")";
				$resultado = $this->con->conectar()->query($_query);

				if($resultado)
				{
					$respuesta = "registrado";
				}
				else{
					$respuesta = "error al registrar";
				}

		} elseif($resultado->num_rows > 0){

			$respuesta = "dui registrado";

		}

		return $respuesta;
	}

	// MÉTODO PARA EDITAR PERSONA
	public function editarPersona($id)
	{
		$_query = "call p_EditarPersona(".$id.", '".$this->dui."', '".$this->nomPersona."', '".$this->apePersona."', ".$this->genero.", '".$this->fechaNac."', '".$this->fechaVenc."', '".$this->profesion."', '".$this->direccion."', ".$this->estadoCivil.", ".$this->idMunicipio.", ".$_SESSION["idUsuario"].")";
		$resultado = $this->con->conectar()->query($_query);

		if($resultado)
		{
			$respuesta = "modificado";
		}
		else 
		{
			$respuesta = "error al modificar el registro";
		}

		return $respuesta;
	}

	// MÉTODO PARA ELIMINAR PERSONA
	public function eliminarPersona($id)
	{
		$_query = "call p_EliminarPersona(".$id.", ".$_SESSION["idUsuario"].")";

		$resultado = $this->con->conectar()->query($_query);

		if($resultado)
		{
			$respuesta = "eliminado";
		}
		else 
		{
			$respuesta = "error al eliminar del padron";
		}

		return $respuesta;
	}

	// Método para Registrar Voto
	public function votar($partido)
	{
		$_query = "call p_Votar(".$partido.", '".$_SESSION["duiPersona"]."')";

		$resultado = $this->con->conectar()->query($_query);

		if($resultado)
		{
			$respuesta = "excelente";
		}
		else
		{
			$respuesta = "nel";
		}

		return $respuesta;
	}

	public function listaMunicipios()
	{
		$_query = "select * from municipio";

		$resultado = $this->con->conectar()->query($_query);

		$datosMunicipio = array();

		while($fila = $resultado->fetch_assoc())
		{
			$datosMunicipio[] = array('data' => $fila["idMunicipio"], 'value' => $fila["nomMunicipio"]);
		}

		return json_encode($datosMunicipio);
	}
	

} // FIN CLASE PERSONA