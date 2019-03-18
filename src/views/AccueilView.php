<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Post;


class AccueilView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
    $posts = Post::All();


    $html = $html . <<<END
    
    
END;

  

		$html = $html . GlobalView::footer();
		return $html;
	}
	
}