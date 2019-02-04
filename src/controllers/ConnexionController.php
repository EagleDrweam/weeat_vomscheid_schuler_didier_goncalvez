<?php

namespace weeat\controllers;

use weeat\views\ConnexionView;

class ConnexionController {

	public function __construct() {}

	public function connecter() {
		$app = \Slim\Slim::getInstance();
		$user=Authentification::authentification('valider_connexion', 'valid_connexion', 'user', 'password', 'email', 'mot_de_passe', 'id_utilisateur');
		if ($user !== false) {
			$_SESSION['user_connected'];
			$app->redirect($app->urlFor('Accueil'));
		}
		else {
			$app->redirect($app->urlFor('Connexion').'?err=1');
		}
	}
	
	public function affichePageCo(){
	    $aff = new ConnexionView();
	    $app = \Slim\Slim::getInstance();
		//echo GlobalView::header(['css1' => 'formulaire.css'], 'Se connecter');
		if (isset($_SESSION['user_connected'])) {
			$app->redirect($app->urlFor('Accueil'));
		}
		echo $aff->render(); //.GlobalView::footer();
	}

}