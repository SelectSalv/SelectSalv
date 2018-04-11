<?php 
require_once "Persona.php";
require_once "Partido.php";
require_once "JRV.php";

/**
* clase detalle de voto
*/
class DetalleVoto
{
	private $idDetalleVoto;
    private $idPersona;
    private $idPartido;
    private $idJrv;

    function getidDetalleVoto()
    {
    	return $this->idDetalleVoto;
    }
    function getidPersona()
    {
    	return $this->idPersona;
    }
    function getidPartido()
    {
    	return $this->idPartido;
    }
    function getidJRV()
	{
		return $this->idJrv;
	}
}

 ?>