<?php

namespace weeat\views;

class GlobalView {

	public static function header() {
		$app = \Slim\Slim::getInstance();
		$rootUI = $app->request->getRootUri();
		$rootUI = str_replace('index.php','',$rootUI);
		$urlAccueil = $app->urlFor('Accueil');
		$urlConnexion = $app->urlFor('Connexion');
		$urlInscription = $app->urlFor('Inscription');
		$urlDeconnexion = $app->urlFor('Deconnexion');
		$urlRestaurant = $app->urlFor('ListeRestaurant');
		$urladdpost = $app->urlFor('post');
		$url = $app->urlFor('TryConnexion');

		$html = <<<END
<!DOCTYPE html>
<html>
<head>
	<title>Weeat</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/test.css">
	<link rel="shortcut icon" type="image/x-icon" href="web/img/siteicone.ico" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> 	
END;
		/*foreach ($tabcss as $css) {
			$html = $html.'<link rel="stylesheet" href="'.$rootUI.'/web/css/'.$css.'" />';
		}*/
		$html=$html.<<<END

</head>
<body>
		

	
	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-blue">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      			<li class="nav-item active">
        			<a class="nav-link" href="$urlAccueil"><img src="./web/image/logo1.png" width="auto" height="70px" /> <span class="sr-only">(current)</span></a>
      			</li>
    		</ul>
  		
END;
		if (isset($_SESSION['user_connected'])) {
			if ($_SESSION['user_connected']) {

				$html = $html.<<<END

				<ul class="boutonConnexion">
					<a href="$urladdpost"><li class="btn btn-primary">Poster une photo/vidéo</li></a> 
					<a href="$urlRestaurant"><li class="btn btn-light">Liste des restaurants</li></a>
					<a href="$urlDeconnexion"><li class="btn btn-danger">Déconnexion</li></a>
				</ul>
END;
			}
		}
		else{
			$html = $html.<<<END
			<div>
			<form method="POST"  class="form-inline mt-2" action="$url" id="connexioninscription">
				<p class="white">
					<label for="email" ></label><input class="form-control" type="email" name="user" id="email" placeholder="Adresse e-mail" required />
				</p>
				<p class="white ml-3 mr-3">
					<label for="mdp"></label><input class="form-control" type="password" name="password" id="mdp" placeholder="Mot de passe" required />
				</p>
				<p class="mt-2">
					<button type="submit" class="btn btn-warning mb-2" name="valider_connexion" value="valid_connexion">Se connecter</button>
				</p>
			</form>
		</div>

END;
		}
		$html = $html.<<<END
		</div>
	</nav>
	<header>
	</header>

END;
		return $html;
	}
	
	public static function footer() {
		$html=<<<END
	<div class="mt-5"></div>	
	<footer>
			
			    <p class="ml-3 mt-2">Axel Didier - Gwendolyn VOMSCHEID - Pierre Goncalvez </p>
			
	</footer>
</body>
</html>
END;
		return $html;
	}
	
}