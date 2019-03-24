<?php

namespace weeat\controllers;

use weeat\views\FilActuView;
use weeat\models\Love;

class FilActuController {

	public function affiche() {
		$av = new FiLActuView();
		echo $av->render();
	}
	
	public function love() {
		$love = new Love();

		$love->id_utilisateur =  $_SESSION['user_connected']['user_id'];
		$love->id_Post = $_POST['nomLove'];
		$love->save();
		$av = new FiLActuView();
		echo $av->render();
	}
}