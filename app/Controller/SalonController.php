<?php

namespace Controller;

use \W\Controller\Controller;

class SalonController extends Controller
{
	//cette action permet de voir la liste des messages d'un salon

	public function seeSalon($id){
		$salonModel = new SalonsModel()
		$salon = $salonsModel->find($id)

		$messagesModel= new MessagesModel()

		$messages = $messagesModel->searchAllWithUserInfos($id);

		$this->show('salons/see', array('salon' => $salon,'messages' => $messages));
	}
}