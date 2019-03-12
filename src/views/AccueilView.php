<?php

namespace weeat\views;

use weeat\views\GlobalView;

class AccueilView {

	public function render() {

		$head = GlobalView::header();
		$app=\Slim\Slim::getInstance();


		$html = <<<END
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  			<ol class="carousel-indicators">
    			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  			</ol>
  				<div class="carousel-inner">
    			<div class="carousel-item active">
      			<img src="img/banniereresto.png" class="d-block w-100" alt="...">
    			</div>
    			<div class="carousel-item">
      			<img src="..." class="d-block w-100" alt="...">
    			</div>
    			<div class="carousel-item">
      			<img src="img/sushidefil.png" class="d-block w-100" alt="...">
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


	<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
		<div class="card">
  			<img src="img/resto-burger.jpg" class="card-img-top" alt="...">
  			<div class="card-body">
    			<p class="card-text-nom">Nom Resto</p>
    			<p class="card-text-categorie">€€-Type</p>
    			<p class="card-text-note">Note</p>
  			</div>
		</div>
		</div>	
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
		<div class="card">
  			<img src="img/pizza3.jpeg" class="card-img-top" alt="...">
  			<div class="card-body">
    			<p class="card-text-nom">Nom Resto</p>
    			<p class="card-text-categorie">€€-Type</p>
    			<p class="card-text-note">Note</p>
  			</div>
		</div>
		</div>	
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
		<div class="card">
  			<img src="img/chinois3.jpg" class="card-img-top" alt="...">
  			<div class="card-body">
    			<p class="card-text-nom">Nom Resto</p>
    			<p class="card-text-categorie">€€-Type</p>
    			<p class="card-text-note">Note</p>
  			</div>
		</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
		<div class="card">
  			<img src="img/pizza3.jpeg" class="card-img-top" alt="...">
  			<div class="card-body">
    			<p class="card-text-nom">Nom Resto</p>
    			<p class="card-text-categorie">€€-Type</p>
    			<p class="card-text-note">Note</p>
  			</div>
		</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
		<div class="card">
  			<img src="img/resto-burger.jpg" class="card-img-top" alt="...">
  			<div class="card-body">
    			<p class="card-text-nom">Nom Resto</p>
    			<p class="card-text-categorie">€€-Type</p>
    			<p class="card-text-note">Note</p>
  			</div>
		</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
		<div class="card">
  			<img src="img/pizza3.jpeg" class="card-img-top" alt="...">
  			<div class="card-body">
    			<p class="card-text-nom">Nom Resto</p>
    			<p class="card-text-categorie">€€-Type</p>
    			<p class="card-text-note">Note</p>
  			</div>
		</div>
		</div>
	</div>	
	</div>
END;
		
		$foot = GlobalView::footer();
		return $head.$html.$foot;
	}
	
}