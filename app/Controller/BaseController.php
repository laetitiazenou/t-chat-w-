<?php

namespace Controller;

use \W\Controller\Controller;

class BaseController extends Controller

{
	protected $engine;

	public function __construct() {
		
		//je fais appel à la méthode __construct de la classe parente (Controller)
		//ce qui me permet de surcharger cette méthode et non de la redéfinir entièrement
		
		parent:: _construct();

		//je stocke dans la variable de class engine une instance de League\Plates\Engine alors que 
		//cette instance était crée directement dans la méthode show() de Controller
		
		$this->engine = new \League\Plates\Engine(self::PATH_VIEWS);
	}
}