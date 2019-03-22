<?php

namespace weeat\controllers;

use weeat\views\InscriptionView;
use weeat\models\Utilisateur;

class InscriptionControllers {

	public function __construct() {}

	public function inscrire() {
		$app = \Slim\Slim::getInstance();
		$request = $app->request;
		$bouton = $request->post('valider_inscription');
		if (isset($bouton) && $bouton == 'valid_inscription') {
			$ger = '';
			if ($ger != '') {
				$app->redirect($app->urlFor('Accueil').'?err='.$ger);
			}
			Authentification::createUser($request->post('email'), $request->post('password'), $request->post('nom'), $request->post('prenom'), $request->post('adresse'), $request->post('codePostal'), $request->post('ville'), $request->post('tel'), 'email', 'mot_de_passe', 'nom', 'prenom', 'adresse', 'code_postal', 'ville', 'tel');
			$app->redirect($app->urlFor('Accueil'));
		}
	}
	
	public function affichePageInscr() {
		$aff = new InscriptionView();
		$app = \Slim\Slim::getInstance();
		if (isset($_SESSION['user_connected'])) {
			$app->redirect($app->urlFor('Accueil'));
		}
		echo $aff->render();
	}

}