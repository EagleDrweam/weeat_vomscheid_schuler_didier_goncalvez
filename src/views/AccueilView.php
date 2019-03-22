<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Post;


class AccueilView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
    $url = $app->urlFor('TryInscription');
    


    $html = $html . <<<END

    <h2 class="text-center mt-5">Le premier réseau social qui vous permet de commander en ligne vos plats préférés !</h2>
    <p class="text-center"><img src="./web/image/logo.png" height="180px" /></p>

        <p class="text-center"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
          Inscription
        </button></p>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div>
                  <form method="POST" action="$url" id="connexioninscription">
                      <div class="form-row">
                      
                        <div class="form-group col-md-6">
                          <p>
                            <label for="nom" >Nom: </label><input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required />
                          </p>
                        </div>
                        <div class="form-group col-md-6">
                          <p>
                            <label for="prenom" >Prénom: </label><input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom" required />
                          </p>
                        </div>
                        <div class="form-group col-md-12">
                          <p>
                            <label for="email" >Adresse email : </label><input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
                          </p>
                        </div>
                        <div class="form-group col-md-6">
                          <p>
                            <label for="mdp">Mot de passe : </label><input type="password" name="password" id="mdpinscription"  class="form-control" placeholder="Mot de passe" required minlength="8"/><span class="petit">*Minimum 8 caractères</span>
                          </p>
                        </div>
                        <div class="form-group col-md-6">
                          <p>
                            <label for="mdp2">Confirmez le mot de passe : </label><input type="password" name="password2" id="mdp2inscription" class="form-control" onkeyup="checkMdp()" placeholder="Mot de passe" required minlength="8"/>  <label id="mdperror"></label>                        </p>
                        </div>
                          <button type="submit" name="valider_inscription" value="valid_inscription" class="btn btn-danger">S'inscrire</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <br><br>
    <h4 class="text-center">Partagez, commentez, likez les photos de vos amis</h4>
    <div class="container mb-3">
    <div class="row">
        <div class="col-sm">
          <div class="card" ">
            <img src="./web/image/restaurant/image23.jpg" class="card-img-top" />
            <p class="card-text">Le meilleur repas de ma vie <br> <i>#chezChrist</i>
            <br><img src="./web/image/like.jpg" height="15px" width="20px" /></p>
          </div>
        </div>

        <div class="col-sm">
          <div class="card">
            <img src="./web/image/restaurant/image19.jpg" class="card-img-top" />
            <p class="card-text">Il en faut peu pour être heureux <br> <i>#mySushi</i>
            <br><img src="./web/image/like.jpg" height="15px" width="20px" /></p>
          </div>
        </div>
        <div class="col-sm">
          <div class="card">
            <img src="./web/image/restaurant/image8.jpg" class="card-img-top" />
            <p class="card-text">La bonne pizza ! <br> <i>#pizza&co</i> 
            <br><img src="./web/image/like.jpg" height="15px" width="20px"/></p>
          </div>
        </div>
        <div class="col-sm">
          <div class="card">
            <img src="./web/image/restaurant/image11.jpg" class="card-img-top" />
            <p class="card-text">Que dire de plus que la photo... <br> <i>#frenchy</i>
            <br><img src="./web/image/like.jpg" height="15px" width="20px" /></p>
          </div>
        </div>
      </div>
    </div>

    <h4 class="text-center mt-5">Parcourez et commandez vos plats en ligne dans votre restaurant favori</h4> 
    <div class="container mb-5">
      <div class="row">
        <div class="col-sm">
            <div class="card">
              <img src="./web/image/restaurant/image1.jpg" class="card-img-top" />
              <div class='card-body'>
                <p class="card-text-nom strong">McDonald's</p>
                <p class='card-text-categorie'>Fast Food
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img src="./web/image/restaurant/image6.jpg" class="card-img-top" />
              <div class='card-body'>
                <p class="card-text-nom strong">Quick</p>
                <p class='card-text-categorie'>Fast Food
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img src="./web/image/restaurant/image21.jpg" class="card-img-top" />
              <div class='card-body'>
                <p class="card-text-nom strong">Sushi&co</p>
                <p class='card-text-categorie'>Japonais
              </div>
            </div>
          </div>
        </div>
      </div>

    
END;

  

		$html = $html . GlobalView::footer();
		return $html;
	}
	
}