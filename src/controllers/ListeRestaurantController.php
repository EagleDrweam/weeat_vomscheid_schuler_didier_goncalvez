<?php 

namespace weeat\controllers;
use weeat\models\Restaurant;
use weeat\views\ListeRestaurantView;


class ListeRestaurantController {

	public function affiche(){

		$aff = new ListeRestaurantView();
		echo $aff->render();
	}

}

