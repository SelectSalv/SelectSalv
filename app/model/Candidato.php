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
    	$this->idCandidato=$idCantidato;
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


		//query para obtener el numero de candidatos registrado con el dui que se intenta ingresar
		$query_1="call p_buscarCandidato('".$this->idPersona."')";

		$numCandidato=$this->con->conectar()->query($query_1);
		//fin de query

		//query para obtener el numero de candidados registrado con el mismo ártiso y el mismo tipo de candidato
		$query_2="SELECT idCandidato FROM candidato WHERE idPartido=".$this->idPartido." AND idTipoCandidato=".$this->idTipoCandidato." AND estado=1";
		$validacionPartido=$this->con->conectar()->query($query_2);
		//fin de la query


		//query para registrar candidato
		$sql="call p_RegCandidato(".$this->idPartido.", ".$this->idTipoCandidato.", '".$this->idPersona."','".$destino."',".$estado.")";




		if($numCandidato->num_rows>0)
		{
			$respuesta="dui";
		}
		else{
			if($validacionPartido->num_rows>0)
			{
				$respuesta="tipo";
			}
			else{

				$info=$this->con->conectar()->query($sql);

		if($info)
		{
			$respuesta="registrado";
		}
		else
		{
			$respuesta="error al registrar";

		}


			}

		
		

		}
		
		return $respuesta;
		



	}

	# MÉTODO PARA MODIFICAR CANDIDATO
	public function modCandidato($destino)
	{
		$_query="SELECT idPersona FROM persona WHERE dui='".$this->idPersona."' ";

		$resp=$this->con->conectar()->query($_query);
		$id=$resp->fetch_assoc();



		if($destino==null){
			$sql="UPDATE candidato SET idPersona='".$id['idPersona']."', idPartido=".$this->idPartido.", idTipoCandidato=".$this->idTipoCandidato." WHERE IdCandidato=".$this->idCandidato."";

			

			
		}
		else if($destino!=null)
		{
			$sql="UPDATE candidato SET idPersona='".$id['idPersona']."', idPartido=".$this->idPartido.", idTipoCandidato=".$this->idTipoCandidato.", rutaCandidato='".$destino."' WHERE IdCandidato=".$this->idCandidato."";
			
		}

		$resp=$this->con->conectar()->query($sql);

		if($resp)
		{

			$info="Excelente";
			

		}
		else
		{
			$info="error";
			
		}

		return $info;

	}

	# MÉTODO PARA ELIMINAR CANDIDATO
	public function eliminarCandidato()
	{

			$sql="call p_EliminarCandidato(".$this->idCandidato.")";

			$resp=$this->con->conectar()->query($sql);

			if($resp)
			{

				$info="ok";
			}
			else
			{
				$info="no";
			}

			return $info;
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


				$mas = '';

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
								"acciones": "'.$mas.$modificar.$eliminar.'"
							},';

		   }
		

		$datos = substr($datos,0, strlen($datos) - 1);

        return '{"data" : ['.$datos.']}';



		
	}


	public function getInformation($idCandidato)
	{

		$sql="SELECT p.dui,c.idPartido, c.idTipoCandidato, c.rutaCandidato FROM candidato c INNER JOIN persona p ON p.idPersona=c.idPersona WHERE p.idPersona=".$idCandidato;

		$info=$this->con->conectar()->query($sql);

		$data=$info->fetch_assoc();

		
	

		return json_encode($data);

	}


	public function getAllPartido()
	{

		$sql="SELECT idPartido, nomPartido FROM partido";

		$resp=$this->con->conectar()->query($sql);

		$datos=array();
		while($data=$resp->fetch_assoc())

		{
			if($data['nomPartido'] != 'Voto Nulo')
			{
				$datos[$data['idPartido']]=$data['nomPartido'];
			}

		}

		$info=json_encode($datos);
		
		return $info;

        

	}


	public function getAllTipo()
	{

		$sql="SELECT idTipoCandidato, descTipoCandidato FROM tipocandidato";
		$resp=$this->con->conectar()->query($sql);

		$datos=array();
		while ($data=$resp->fetch_assoc()) {
			
			$datos[$data['idTipoCandidato']]=$data['descTipoCandidato'];
		}

		$info=json_encode($datos);
		return $info;


	}



}

