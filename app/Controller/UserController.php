<?php

namespace Controller;

use \W\security\AuthentificationModel;
use \Model\UtilisateursModel;

class 	UserController extends Controller
{
	// Cette fonction sert à afficher la liste des utilisateurs
	
	public function listUsers() {

		$usersModel = new UtilisateursModel();

		$usersList = $usersModel->findAll();

			$this->show('users/list',array('listUsers' => $usersList));

	}

	public function login(){
		if ( !empty($_POST)) {

		//je vérifie la non vacuité du pseudo en POST
		if(empty($_POST['pseudo'])) {
			// si pseudo est vide on ajoute un message d'erreur
		}
		//je vérifie la non vacuité du mot de passe en POST
		if( empty($_POST['mot de passe'])) {

		}

		$auth = new AuthentificationModel();
		if( !empty($_POST['pseudo']) && empty($_POST['mot_de_passe'])) {
			//vérification de l'existence de l'utilisateur
			$idUser = $auth->isValidLoginInfo($_POST['pseudo'], $_POST['mot_de_passe']);

			//si l'utilisateur existe bel et bien
			if($idUser !=0) {
				$utilisateurModel = new UtilisateursModel();
				
				//je récupère les infos de l'utilisateur et je m'en sers pour le connecter au site à l'aide de $auth->logUserIn
				$userInfos = $utilisateurModel->find($idUser);
				$auth->logUserIn($userInfos);

				//une fois l'utilisateur connecté, je le redirige vers l'accueil
				$this->redirectToRoute('default_home');
			}else {
				// les infos de connexion sont incorrects, on avertit l'utilisateur
				}
			}

	}
		$this->show('users/login', array('datas' => ($_POST) ? $_POST : array() ));
    	
	}

	public function logout() {

		$auth = new AuthentificationModel();
		$auth->logUserOut();
		$this->redirectToRoute('login');
	}	

}