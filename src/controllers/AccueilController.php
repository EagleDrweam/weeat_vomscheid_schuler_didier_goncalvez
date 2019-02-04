<?php

namespace weeat\controllers;

use weeat\views\AccueilView;

class AccueilController {

	public function affiche() {
		$av = new AccueilView();
		echo $av->render();
	}
	
}