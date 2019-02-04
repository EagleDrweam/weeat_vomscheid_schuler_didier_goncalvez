<?php

namespace weeat\controllers;

use weeat\models\Utilisateur;

class Authentification {

	public function __construct() {}

	public static function authentification($nomBoutonCo, $valBoutonCo, $nomFormuMail, $nomFormuPassword, $nomBDDmail, $nomBDDpassword, $nomBDDUserID='0') {
		$app = \Slim\Slim::getInstance();
		$request = $app->request;
		$bouton = $request->post($nomBoutonCo);
		if (isset($bouton) && $bouton == $valBoutonCo &&  filter_var($request->post($nomFormuMail), FILTER_SANITIZE_EMAIL) !== false) {
			$user = Utilisateur::where($nomBDDmail, '=', $request->post($nomFormuMail))->first();
			if ($user != NULL && password_verify(filter_var($request->post($nomFormuPassword), FILTER_SANITIZE_STRING), $user->$nomBDDpassword)) {
				$_SESSION['user_connected']=array('email' => $user->$nomBDDmail,
												  'user_id' => $user->$nomBDDUserID,
												  'ip_client' => $_SERVER['REMOTE_ADDR']);
				setcookie('createur', $_SESSION['user_connected']['user_id'], time() + 3600*325*24, "/", null, false, true);
				return $user;
			}
		}
		return false;
	}
	
	public static function createUser($mail, $password, $nom, $prenom, $adresse, $codePostal, $ville, $tel, $nomBDDmail, $nomBDDpassword, $nomBDDnom, $nomBDDprenom, $nomBDDadresse, $nomBDDcodePostal, $nomBDDville, $nomBDDtel) {
		$user = new Utilisateur();
		$user->$nomBDDmail = filter_var($mail, FILTER_SANITIZE_EMAIL);
		$user->$nomBDDtel = filter_var($tel, FILTER_VALIDATE_INT);
		$user->$nomBDDadresse = filter_var($adresse, FILTER_SANITIZE_STRING);
		$user->$nomBDDcodePostal = filter_var($codePostal, FILTER_VALIDATE_INT);
		$user->$nomBDDville = filter_var($ville, FILTER_SANITIZE_STRING);
		if ($nom != '') {
			$user->$nomBDDnom = filter_var($nom, FILTER_SANITIZE_STRING);
		}
		if ($prenom != '') {
			$user->$nomBDDprenom = filter_var($prenom, FILTER_SANITIZE_STRING);
		}
		$user->$nomBDDpassword = password_hash(filter_var($password, FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
		$user->save();
	}

}