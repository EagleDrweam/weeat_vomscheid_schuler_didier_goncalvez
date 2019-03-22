<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Post;


class MonProfilView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
		$urladdpost = $app->urlFor('post');
	    $posts = Post::where('id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->get();

	    $html = $html . <<<END

	    <p class="text-center mt-5"><a href="$urladdpost" class="btn btn-warning">Poster une photo</a></p>

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

