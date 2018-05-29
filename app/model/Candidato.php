<?php

class Candidato extends ModeloBase
{
	private $idCandidato;
	private $idPartido;
    private $idTipoCandidato;
    private $idPersona;

    protected $con;

    //MÉTODO INICIALIZADOR CLASE CANDIDATO

    public function __construct()
    {
		
    	

    	parent::__construct();
    }


    // REFACTORIZACIÓN DE PROPIEDADES CLASE CANDIDATO

    # Métodos GET y SET para idCandidato
    public function getIdCandidato()
    {
    	return $this->idCandidato;
    }
    public function setIdCandidato($idCantidato)
    {
    	$this->idCantidato=$idCantidato;
    }

    # Métodos GET y SET para idPartido
    public function getIdPartido()
	{
		return $this->idPartido;
	}
	public function setIdPartido($id)
	{
		$this->idPartido = $id;
	}

	# Métodos GET y SET para idTipoCandidato
	public function getIdTipoCandidato()
	{
		return $this->idTipoCandidato;
	}
	public function setIdTipoCandidato($id)
	{
		$this->idTipoCandidato = $id;
	}

	# Métodos GET y SET para Idpersona
	public function getIdPersona()
	{
		return $this->idPersona;
	}
	public function setIdPersona($id)
	{
		$this->idPersona = $id;
	}

public function getCandidatoId($id)
	{
		$_query = "call p_obtenerCandidatoId(".$id.")";

		$resultado = $this->con->conectar()->query($_query);

		$datos = $resultado->fetch_assoc();

		return json_encode($datos);
	}
	

	# MÉTODO PARA REGISTRAR CANDIDATO
	public function regCandidato($estado, $destino)
	{

		$sql="call p_RegCandidato(".$this->idPartido.", ".$this->idTipoCandidato.", '".$this->idPersona."','".$destino."',".$estado.")";

		
		


		$info=$this->con->conectar()->query($sql);

		if($info)
		{
			$respuesta="registrado";
		}
		else
		{
			$respuesta="error al registrar";

		}
		
		return $respuesta;
		



	}

	# MÉTODO PARA MODIFICAR CANDIDATO
	public function modCandidato()
	{

	}

	# MÉTODO PARA ELIMINAR CANDIDATO
	public function eliminarCandidato()
	{

	}

	# MÉTODO PARA BUSCAR CANDIDATO
	public function getCandidatos()
	{

		$sql="SELECT * FROM v_getcandidatos";

		$resultado = $this->con->conectar()->query($sql);
		$datos = "";
		while ($fila = $resultado->fetch_assoc()) {
		    
		   
			   	 //Inicializacion de botones
			    $mas = null;
			    $modificar = null;
			    $eliminar = null;


				$mas = '<button id=\"'.$fila["IdCandidato"].'\" class=\"btn btn-secondary btnDetalles btn-raised bmd-btn-icon\"><i class=\"material-icons\">more_horiz</i></button>';

				if(($_SESSION["rol"] == "Desarrollador") || ($_SESSION["rol"] == "Administrador"))
				{
					$modificar = '<button id=\"'.$fila["IdCandidato"].'\" class=\"btn btn-info btnModificar btn-raised bmd-btn-icon\"><i class=\"material-icons\">edit</i></button>';

					$eliminar = '<button id=\"'.$fila["IdCandidato"].'\"  class=\"btn btn-danger btnEliminar btn-raised bmd-btn-icon\"><i class=\"material-icons\">clear</i></button>';
				}
				
				

				$datos .= ' {	"idCandidato": "'.$fila["IdCandidato"].'",
								"dui": "'.$fila["dui"].'",
								"nombre": "'.$fila["nomPersona"].'",
								"apellido": "'.$fila["apePersona"].'",
								"partido": "'.$fila["nomPartido"].'",

								"tipo": "'.$fila["descTipoCandidato"].'",
								"ruta": "'.$fila["rutaCandidato"].'",

								"tipo": "'.$fila["descTipoCandidato"].'",

								"acciones": "'.$mas.$modificar.$eliminar.'"
							},';

		   }
		

		$datos = substr($datos,0, strlen($datos) - 1);

        return '{"data" : ['.$datos.']}';



		
	}

}

