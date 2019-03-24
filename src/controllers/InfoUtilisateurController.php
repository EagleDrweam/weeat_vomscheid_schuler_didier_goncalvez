<?php

namespace weeat\controllers;

use weeat\views\InfoUtilisateurView;
use weeat\models\Utilisateur;

class InfoUtilisateurController {

	public function __construct() {}

	public function affiche() {

		$av = new InfoUtilisateurView();
		echo $av->render();
	}

	public function modifier(){
		$app = \Slim\Slim::getInstance();

		$user = Utilisateur::where('id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->first();

		$user->nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
		$user->prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
		$user->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$user->tel = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);
		$user->adresse = filter_var($_POST['adresse'], FILTER_SANITIZE_STRING);
		$user->code_postal = filter_var($_POST['code_postal'], FILTER_SANITIZE_STRING);
		$user->ville = filter_var($_POST['ville'], FILTER_SANITIZE_STRING);
		$user->update();

		$av = new InfoUtilisateurView();
		echo $av->render();
	}
}