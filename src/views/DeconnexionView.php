<?php

namespace weeat\views;

class DeconnexionView {
	
 	public function __construct() {}

 	public function render() {
 		$app = \Slim\Slim::getInstance();
		$html = GlobalView::header();
		$html = $html.<<<END
<p>Vous avez bien été déconnecté.</p>
<p>Redirection vers la page d'accueil dans 5 secondes...<p>
END;
		$html = $html.GlobalView::footer();
		return $html;
	}
	
}