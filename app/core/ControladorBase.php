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

	public function render($doc, $carpeta, $header = null, $menu = null)
	{
		require_once 'app/view/plantillas/header.php';
		if($header != null)
		{
			require_once 'app/view/plantillas/'.$header.'.php';
		}
		if($menu != null)
		{
			require_once 'app/view/plantillas/menu.php';
		}
	  	require_once 'app/view/'.$carpeta.'/'.$doc.'.php';
	  	require_once 'app/view/plantillas/footer.php';
	}
}