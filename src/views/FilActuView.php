<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Post;


class FilActuView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
    $urladdpost = $app->urlFor('post');
    $urlmonprofil = $app->urlFor('MonProfil');
    $posts = Post::All()->sortByDesc('dateCrea');


    $html = $html . <<<END
    
    <h1 class="text-center  mt-5">Fil d'actualité</h1><br>
    <p class="text-center"><a href="$urladdpost" class="btn btn-warning">Poster une photo</a></p>
    <p class="text-center"><a href="$urlmonprofil" class="btn btn-danger">Mon profil</a></p>

    <div class="container">
      <div class="row">
END;

    foreach($posts as $post){

      $html = $html . "
                      <div class='col-sm-4 like'>
                        <div class='card'>
                          <img src='./post/" .
                        $post->Nom . "." . $post->extension .
                        "' class='card-img-top' />
                        <p class='card-text'>" . $post->Commentaire . "<br> <i>" . $post->hastag . "</i><br><img src='./web/image/like.jpg' height='15px' width='20px'/></p>
                        </div>
                      </div>
      ";

    }
    $html = $html ."</div></div>";

		$html = $html . GlobalView::footer();
		return $html;
	}
	
}