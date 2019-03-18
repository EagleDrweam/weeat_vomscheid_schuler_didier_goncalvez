<?php

namespace weeat\controllers;

use weeat\views\FilActuView;

class FilActuController {

	public function affiche() {
		$av = new FiLActuView();
		echo $av->render();
	}
	
}