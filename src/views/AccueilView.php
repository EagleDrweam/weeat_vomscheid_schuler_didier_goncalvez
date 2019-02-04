<?php

namespace weeat\views;

use weeat\views\GlobalView;

class AccueilView {

	public function render() {

		$head = GlobalView::header();
		$app=\Slim\Slim::getInstance();


		$html = <<<END
		<p>Bienvenue sur la page d'accueil</p>			
END;
		
		$foot = GlobalView::footer();
		return $head.$html.$foot;
	}
	
}