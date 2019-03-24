<?php

namespace weeat\controllers;

use weeat\views\ListePlatView;
use weeat\models\Panier;
use weeat\models\Favori;
use weeat\models\Invite;


class ListePlatController {

	public function affiche() {

		$av = new ListePlatView();
		echo $av->render();
	}

	public function panier(){
		$app = \Slim\Slim::getInstance();

		$panier = new Panier();

 		$id = Invite::where('invite', '=', $_SESSION['user_connected']['user_id'])->first();

		$panier->id_utilisateur = $_SESSION['user_connected']['user_id'];
		$panier->id_plat = $_POST['platPanier'];

 		if(is_null($id)){
 			$panier->id_invitation = $_SESSION['user_connected']['user_id'];
 		}else{
 			$panier->id_invitation = $id->owner;
 		}

		$panier->save();

		$av = new ListePlatView();
		echo $av->render();

	}

	public function favori(){
		$app = \Slim\Slim::getInstance();
		$favori = new Favori();
		$favoris = Favori::where('id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->get();

		$favori->id_utilisateur = $_SESSION['user_connected']['user_id'];
		$favori->id_restaurant = $_POST['favori'];

		$favori->save();

		$av = new ListePlatView();
		echo $av->render();
	}

	public function supp(){
		$app = \Slim\Slim::getInstance();
		$fav = Favori::where('id_restaurant', '=', $_GET["id"] , 'and', 'id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->first();
		$fav->delete();
		$av = new ListePlatView();
		echo $av->render();
	}
}