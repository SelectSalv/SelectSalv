<?php

class PersonaController extends ControladorBase
{

  public function __construct()
  {
  	parent::__construct();
  	$this->model = new Persona();
  }
  
}