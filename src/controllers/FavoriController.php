<?php

namespace weeat\controllers;

use weeat\views\FavoriView;
use weeat\models\Favori;


class FavoriController {

	public function affiche() {

		$av = new FavoriView();
		echo $av->render();
	}

	public function supprimer(){
		$app = \Slim\Slim::getInstance();
		$fav = Favori::where('id_restaurant', '=', $_POST["favori"] , 'and', 'id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->first();
		$fav->delete();
		$av = new FavoriView();
		echo $av->render();
	}
}