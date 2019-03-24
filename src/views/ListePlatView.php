<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Plat;
use weeat\models\Restaurant;
use weeat\models\Favori;


class ListePlatView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
		$urlres = $app->urlFor('ListeRestaurant');
		$url = $app->urlFor('ListePlatPan');
		$url2 = $app->urlFor('ListePlatFav');
		$url3 = $app->urlFor('SuppListePlatFav');
		$id=$_GET['id'];
		$plats = Plat::where('id_restaurant', '=', $_GET["id"])->get();
		$resto = Restaurant::where('id_restaurant', '=', $_GET["id"])->first();
		$fav = Favori::where('id_restaurant', '=', $_GET["id"] , 'and', 'id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->first();

		if($fav==null){
			$html = $html . <<<END

			<h1 class="text-center mt-5">$resto->nom_restaurant</h1>

			<form method='POST' action='$url2?id=$id' id='rest_fav'>
	      						   <input type='hidden' name='favori' value='$resto->id_restaurant' />
	      						   <p class='text-center'><button type="submit" class="btn btn-danger mt-3 mb-5">Mettre le restaurant dans mes favoris</button></p>
	    	</form>




			<div class="container">
	 		<div class="row">		
END;

		}else{
			$html = $html . <<<END

			<h1 class="text-center mt-5">$resto->nom_restaurant</h1>

			<form method='POST' action='$url3?id=$id' id='rest_fav'>
	      						   <input type='hidden' name='favori' value='$resto->id_restaurant' />
	      						   <p class='text-center'><button type="submit" class="btn btn-danger mt-3 mb-5">Enlever le restaurant de mes favoris</button></p>
	    	</form>




			<div class="container">
	 		<div class="row">		
END;

		}
		
	 	foreach($plats as $plat){
	 		$html = $html . "<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'>
		    				   <div class='card' id='listeResto' >
		    				   	<img src='./web/image/" . $plat->photo_plat . "' class='card-img-top' alt='...'>
  			  					 <div class='card-body'>
      								<p class='card-text-nom'>" . $plat->nom_plat . "</p>
      								<p class='card-text-categorie'>" . $plat->prix_plat . "€</p>
      							 </div>
      						   </div>

      						   <form method='POST' action='$url?id=$plat->id_restaurant' id='plat_panier'>
	      						   <input type='hidden' name='platPanier' value='$plat->id_plat' />
	      						   <p class='text-center'><a href='#'><button type='submit' name='envoiPanier' value='envoiePanier' class='btn btn-warning mt-5'>Ajouter au panier</button></a></p>
	      						</form>
      						</div>"
      						;
	 	}

	 	$html = $html . "
		</div>
		</div>
		<p class='text-center mt-5'><a href='$urlres' class='btn btn-light'>Page précédente</a></p>";
		
		$html = $html.GlobalView::footer();
		return $html;
	}
}


		

