<?php 

namespace weeat\controllers;
use weeat\models\Restaurant;
use weeat\views\ListeRestaurantView;


class ListeRestaurantController {

	public function affiche(){
		$aff = new ListeRestaurantView();

		if(isset($_GET["id"])){
			echo $aff->render2($_GET["id"]);
		}else{
			echo $aff->render();
		}

	}

}

