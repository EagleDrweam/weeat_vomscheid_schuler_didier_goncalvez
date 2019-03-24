<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Utilisateur;

class InfoUtilisateurView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
		 $url2 = $app->urlFor('MonProfil');
		 $url = $app->urlFor('ModifyUser');
    $urlmonprofil = $app->urlFor('MonProfil');
		$user = Utilisateur::where('id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->first();


		$html = $html . <<<END

		

    	<h1 class="text-center mt-5">Modifier mon profil</h1>
      <p class="text-center mb-5"><a href="$url2" class="btn btn-link">Page précédente</a></p>

		<form method="POST" action="$url" id="modifierUtilisateur">
                      <div id="profilmodif" class="form-row">
                      
                        <div class="form-group col-md-6">
                          <p>
                            <label for="nom" >Nom: </label><input type="text" name="nom" id="nom" class="form-control" value="$user->nom"  />
                          </p>
                        </div>
                        <div class="form-group col-md-6">
                          <p>
                            <label for="prenom" >Prénom: </label><input type="text" name="prenom" id="prenom" class="form-control" value="$user->prenom" />
                          </p>
                        </div>
                        <div class="form-group col-md-6">
                          <p>
                            <label for="email" >Adresse e-mail : </label><input type="email" name="email" id="email" class="form-control" value="$user->email" />
                          </p>
                        </div>

                        <div class="form-group col-md-6">
                          <p>
                            <label for="email" >Téléphone : </label><input type="text" name="tel" id="tel" class="form-control" value="$user->tel" />
                          </p>
                        </div>

                        <div class="form-group col-md-12">
                          <p>
                            <label for="adresse" >Adresse : </label><input type="text" name="adresse" id="adresse" class="form-control" value="$user->adresse" />
                          </p>
                        </div>

                        <div class="form-group col-md-8">
                          <p>
                            <label for="ville" >Ville: </label><input type="text" name="ville" id="ville" class="form-control" value="$user->ville" />
                          </p>
                        </div>

                        <div class="form-group col-md-4">
                          <p>
                            <label for="code_postal" >Code postal : </label><input type="text" name="code_postal" id="code_postal" class="form-control" value="$user->code_postal" />
                          </p>
                        </div>

                        
                        
                          <button type="submit" name="modifier_user" value="modifier_user" class="btn btn-danger">Modifier</button>
                    </div>
                  </form>
END;

$html = $html . GlobalView::footer();
		return $html;
	}

}