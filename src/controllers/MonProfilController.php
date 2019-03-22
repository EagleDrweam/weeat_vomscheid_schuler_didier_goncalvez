<?php 

namespace weeat\controllers;

use weeat\views\MonProfilView;
use weeat\models\Post;

class MonProfilController
{
	
	public function affiche() {
		$av = new MonProfilView();
		echo $av->render();	}
}