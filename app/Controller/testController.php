<?php

namespace Controller;

use \W\Controller\Controller;

class testController extends Controller
{

	// *
	//  * Page d'accueil par défaut
	 
	public function monAction()
	{
		$this->show('test/index');
	}

}