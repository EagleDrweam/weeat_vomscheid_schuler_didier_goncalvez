<?php

namespace weeat\views;

use weeat\views\GlobalView;

class ListeRestaurantView {

	public function render() {

		$head = GlobalView::header();
		$app=\Slim\Slim::getInstance();


		$html = <<<END
		
		<p>Liste des retaurants :</p>			
END;
		
		$foot = GlobalView::footer();
		return $head.$html.$foot;
	}
	
}