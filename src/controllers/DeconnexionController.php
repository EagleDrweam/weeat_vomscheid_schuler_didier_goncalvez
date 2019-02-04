<?php

namespace weeat\controllers;

use weeat\views\DeconnexionView;

class DeconnexionController {

	public function __construct() {}

	public function deconnecter() {
		$aff = new DeconnexionView();
		$app = \Slim\Slim::getInstance();
		header('Refresh: 5; URL='.$app->urlFor('Accueil'));
		if (isset($_SESSION['user_connected'])) {
			session_destroy();	
		}
		if (!isset($_SESSION['user_connected'])) {
			$app->redirect($app->urlFor('Accueil'));
		}
		echo $aff->render();
	}

}