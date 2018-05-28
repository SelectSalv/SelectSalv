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
	public function regCandidato($estado)
	{

		$sql="call p_RegCandidato(".$this->idPartido.", ".$this->idTipoCandidato.", '".$this->idPersona."',".$estado.")";

		
		


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

		$sql="SELECT p.dui, p.nomPersona, b.nomPartido, t.descTipoCAndidato FROM candidato c INNER JOIN persona p ON p.idPersona=c.idPersona INNER JOIN partido b ON b.idPartido=c.idPartido INNER JOIN tipocandidato t ON t.idTipoCandidato=c.idTipoCandidato";

		

		
	}

}

