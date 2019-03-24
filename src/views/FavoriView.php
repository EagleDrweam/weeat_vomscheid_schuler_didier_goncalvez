<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Favori;
use weeat\models\Restaurant;


class FavoriView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
		$urlPlat = $app->urlFor('ListePlat');
		$url = $app->urlFor('Supp');

		$favoris = Favori::where('id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->get();

		
		$html = $html . <<<END

		<h1 class="text-center mt-5 mb-5">Liste de mes restaurants favoris</h1>

		<div class="container">
	 		<div class="row">

END;

		foreach($favoris as $favori){
			$resto = Restaurant::where('id_restaurant', '=', $favori->id_restaurant)->first();
			$html = $html . "<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'>
	 						<a href='$urlPlat?id=$resto->id_restaurant' id='a'>
		    				   <div class='card'>
		    				   	<img src='./web/image/restaurant/" . $resto->photo_restaurant . "' class='card-img-top' alt='...'>
  			  					 <div class='card-body'>
      								<p class='card-text-nom'>" . $resto->nom_restaurant . "</p>
      								<p class='card-text-categorie'>" . $resto->categorie_restaurant . "</p>
      							 </div>
      						   </div></a>
      						

      						<form method='POST' action='$url' id='rest_fav' class='mt-3'>
	      						   <input type='hidden' name='favori' value='$favori->id_restaurant' />
	      						   <p class='text-center'><button type='submit' class='btn btn-danger mt-3 mb-5'>Enlever le restaurant de mes favoris</button></p>
	    	</form></div>";
		}

		$html = $html . "
		</div>
		</div>";



		$html = $html . GlobalView::footer();
		return $html;

	}
}