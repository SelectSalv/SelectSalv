<?php


class ControladorBase
{
	protected $model;

	public function __construct()
	{
		foreach (glob('app/model/*.php') as $model) {
			require_once $model;
		}
	}

	public function render($doc, $controller)
	{
		require_once 'app/view/plantillas/header.php';
	  	require_once 'app/view/'.$controller.'/'.$doc.'.php';
	  	require_once 'app/view/plantillas/footer.php';
	}
}