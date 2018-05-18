<?php 

/**
    * Nombre de la Clase: DetalleVoto
    * Autor: Michelle Urbina
    */
class DetalleVoto extends ModeloBase
{
	private $idDetalleVoto;
    private $idPersona;
    private $idPartido;
    private $idJrv;

    // MÉTODO INICIALIZADOR DE LA CLASE DETALLEVOTO
    public function __construct()
    {
        parent::__construct();
    }

    // REFACTORIZACIÓN DE PROPIEDADES CLASE DETALLEVOTO

    # Método GET para idDetalleVoto
    public function getIdDetalleVoto()
    {
    	return $this->idDetalleVoto;
    }

    # Métodos GET y SET para IdPersona
    public function getIdPersona()
    {
    	return $this->idPersona;
    }
    public function setIdPersona($id)
    {
        $this->idPersona = $id;
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

    # Métodos GET y SET para idJrv
    public function getIdJrv()
	{
		return $this->idJrv;
	}
    public function setIdJrv($id)
    {
        $this->idJrv = $id;
    }
}

 ?>