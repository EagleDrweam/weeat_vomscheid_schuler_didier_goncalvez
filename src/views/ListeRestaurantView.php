<?php

namespace weeat\views;

use weeat\views\GlobalView;
use weeat\models\Restaurant;

class ListeRestaurantView {

	public function render() {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
		$url = $app->urlFor('ListeRestaurant');
		$restos = Restaurant::all();


		$html = $html . <<<END

		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active" data-interval="3500">
		        <img src="./img/bk-pub.jpg" height="170px" class="d-block w-50" alt="...">
      			<img src="./img/mcdo-pub.png" height="170px" class="d-block w-50" alt="...">
		    </div>
		    <div class="carousel-item" data-interval="3500">
		      <img src="./img/mcdo-pub.png" height="170px" class="d-block w-50" alt="...">
			  <img src="./img/banniereresto.png" height="170px" class="d-block w-50" alt="...">
		    </div>
		  </div>
		</div>


		<div class='menuCat'>
			<h2 class='text-center'>Je choisis une catégorie de restaurant :</h2><br /> 
			<div class="container">
			  <div class="row">
			    <div class="col-sm">
			      <a href="$url?id=Fast food"><img src='./web/image/resto-burger.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Américain"><img src='./web/image/o.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Italien"><img src='./web/image/food.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Indien"><img src='./web/image/a.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Japonais"><img src='./web/image/ze.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Français"><img src='./web/image/fr.jpg' /></a>
			    </div>
			  </div>
			  </div>
			</div>
		</div>

		<div class="container">
	 		<div class="row">		
END;

	 	foreach($restos as $resto){
	 		$html = $html . "<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'>
		    				   <div class='card'>
		    				   	<img src='./web/image/restaurant/" . $resto->photo_restaurant . "' class='card-img-top' alt='...'>
  			  					 <div class='card-body'>
      								<p class='card-text-nom'>" . $resto->nom_restaurant . "</p>
      								<p class='card-text-categorie'>" . $resto->categorie_restaurant . "</p>
      							 </div>
      						   </div>
      						</div>";
	 	}

	 	$html = $html . "
		</div>
		</div>";
		
		$html = $html.GlobalView::footer();
		return $html;
	}
	

		public function render2($cat) {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
		$url = $app->urlFor('ListeRestaurant');
		$restos = Restaurant::select('*')->where('categorie_restaurant', $cat)->get();


		$html = $html . <<<END

		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active" data-interval="3500">
		        <img src="./img/bk-pub.jpg" height="170px" class="d-block w-50" alt="...">
      			<img src="./img/mcdo-pub.png" height="170px" class="d-block w-50" alt="...">
		    </div>
		    <div class="carousel-item" data-interval="3500">
		      <img src="./img/mcdo-pub.png" height="170px" class="d-block w-50" alt="...">
			  <img src="./img/banniereresto.png" height="170px" class="d-block w-50" alt="...">
		    </div>
		  </div>
		</div>

		<div class='menuCat'>
			<h2 class='text-center'>Je choisis une catégorie de restaurant :</h2><br /> 
			<div class="container">
			  <div class="row">
			    <div class="col-sm">
			      <a href="$url?id=Fast food"><img src='./web/image/resto-burger.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Américain"><img src='./web/image/o.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Italien"><img src='./web/image/food.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Indien"><img src='./web/image/a.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Japonais"><img src='./web/image/ze.jpg' /></a>
			    </div>
			    <div class="col-sm">
			      <a href="$url?id=Français"><img src='./web/image/fr.jpg' /></a>
			    </div>
			  </div>
			  </div>
			</div>
		</div>

		<div class="container">
	 		<div class="row">		
END;

	 	foreach($restos as $resto){
	 		$html = $html . "<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'>
		    				   <div class='card'>
		    				   	<img src='./web/image/restaurant/" . $resto->photo_restaurant . "' class='card-img-top' alt='...'>
  			  					 <div class='card-body'>
      								<p class='card-text-nom'>" . $resto->nom_restaurant . "</p>
      								<p class='card-text-categorie'>" . $resto->categorie_restaurant . "</p>
      							 </div>
      						   </div>
      						</div>";
	 	}
		
		$html = $html . "
		</div>
		</div>";

		$html = $html.GlobalView::footer();
		return $html;
	}
}