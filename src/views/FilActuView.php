<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Post;
use weeat\models\Love;


class FilActuView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
    $urladdpost = $app->urlFor('post');
    $urlmonprofil = $app->urlFor('MonProfil');
    $urlparam = $app->urlFor('modifier');
    $urllove = $app->urlFor('Love');
    $posts = Post::All()->sortByDesc('dateCrea');


    $html = $html . <<<END
    
    <h1 class="text-center  mt-5">Fil d'actualité</h1><br>

    <div class="container mb-5">
      <div class="row">
      <div class="col-sm-4"></div>
      <div class='col-sm-2'>
    <p class="text-center"><a href="$urladdpost" class="btn btn-warning">Poster une photo</a></p></div>
    <div class="col-sm-2">
    <p class="text-center"><a href="$urlmonprofil" class="btn btn-danger">Mon profil</a></p></div>
    <div class="col-sm-4"></div>
    </div>
    </div>

    <div class="container">
      <div class="row">
END;

    foreach($posts as $post){
      $love = Love::where('id_Post', '=', $post->id_Post, 'and', 'id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->first();
      $html = $html . "
                      <div class='col-sm-4 like mb-2'>
                        <div class='card'>
                          <img src='./post/" .
                        $post->Nom . "." . $post->extension .
                        "' class='card-img-top' />
                        <p class='card-text'>" . $post->Commentaire . "<br> <i>" . $post->hastag . "</i><br>";

                        if($love==null){

                        $html = $html .  "<form method='POST' action='$urllove'>
                       <input type='hidden' name='nomLove' value='$post->id_Post' />
                       <button type='submit' class='bouton btn btn-light'>Likez : <img src='./web/image/no-like.png' height='15px' width='20px'/></button>
                                          </form> </p>
                        </div>
                      </div>";
                      }
                      else {
                        $html = $html . "<img src='./web/image/like.jpg' height='15px' width='20px'/> </p>
                        </div>
                      </div>";
                      }

    }

    $html = $html ."</div></div>";

		$html = $html . GlobalView::footer();
		return $html;
	}
	
}