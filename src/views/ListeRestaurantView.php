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

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  			<ol class="carousel-indicators">
    			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  			</ol>
  			<div class="carousel-inner">
    			<div class="carousel-item active">
      				<img src="./img/banniereresto.png" class="d-block w-100" alt="...">
    			</div>
    			<div class="carousel-item">
      				<img src="./img/sushidefil.png" class="d-block w-100" alt="...">
    			</div>
    			<div class="carousel-item">
      				<img src="./img/banniereresto.png" class="d-block w-100" alt="...">
    			</div>
  			</div>
  			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  			</a>
  			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
  			</a>
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
		
		$html = $html.GlobalView::footer();
		return $html;
	}
	

		public function render2($cat) {

		$html = GlobalView::header();
		$app=\Slim\Slim::getInstance();
		$url = $app->urlFor('ListeRestaurant');
		$restos = Restaurant::select('*')->where('categorie_restaurant', $cat)->get();


		$html = $html . <<<END

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  			<ol class="carousel-indicators">
    			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  			</ol>
  			<div class="carousel-inner">
    			<div class="carousel-item active">
      				<img src="./img/banniereresto.png" class="d-block w-100" alt="...">
    			</div>
    			<div class="carousel-item">
      				<img src="./img/sushidefil.png" class="d-block w-100" alt="...">
    			</div>
    			<div class="carousel-item">
      				<img src="./img/banniereresto.png" class="d-block w-100" alt="...">
    			</div>
  			</div>
  			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  			</a>
  			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
  			</a>
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
		
		$html = $html.GlobalView::footer();
		return $html;
	}
}