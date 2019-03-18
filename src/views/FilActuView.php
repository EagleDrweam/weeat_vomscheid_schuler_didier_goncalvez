<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Post;


class FilActuView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
    $posts = Post::All();


    $html = $html . <<<END
    <h1 class="text-center  mt-5">Fil d'actualité</h1>
    <div class="container">
      <div class="row mt-5"> 
    
END;

    foreach($posts as $post){
      $html = $html . "<div class='card' style='width: 18rem;' <div class='card-body'><h5 class='card-title'>" .
                        $post->titre .
                        "<img class='card-img-top' src='./post/" . $post->Nom . "." . $post->extension . "' />
                      </h5><p class='card-text'>" . $post->Commentaire . "</p></div></div>";
    }

		$html = $html . GlobalView::footer();
		return $html;
	}
	
}