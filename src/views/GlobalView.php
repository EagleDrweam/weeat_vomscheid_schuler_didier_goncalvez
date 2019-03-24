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
		$urlflux = $app->urlFor('MonProfil');
		$urlfav = $app->urlFor('Favori');
		$urlparam = $app->urlFor('modifier');
		$url = $app->urlFor('TryConnexion');
		$urlpanier = $app->urlFor('Panier');
		$html2 = "";
		if (isset($_GET['err']) && $_GET['err'] == 1) {
		      ;
    }

		$html = <<<END
<!DOCTYPE html>
<html>
<head>
	<title>Weeat</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/test.css">
	<link rel="shortcut icon" type="image/x-icon" href="web/img/siteicone.ico" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-theme.min.css">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> 	
END;

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
END;

	if (isset($_SESSION['user_connected'])) {
			if ($_SESSION['user_connected']) {

				$html = $html.<<<END

				<li class="nav-item mt-4"><a href="$urlAccueil"><button class="btn btn-warning">Accueil</button></a></li>
				<li class="nav-item mt-3 ml-1">
				<div class="dropdown mt-2">
					  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Mon compte
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					    <a href="$urlflux"><button class="dropdown-item" type="button">Mon flux</button></a>
					    <a href="$urlfav"><button class="dropdown-item" type="button">Mes favoris</button></a>
					    <a href="$urlparam"><button class="dropdown-item" type="button">Mes paramètres</button></a>
					    <a href="$urlDeconnexion"><button class="dropdown-item" type="button">Déconnexion</li></button></a>
					  </div>
					</div>
				</li>
END;
}
}

		$html = $html.<<<END
    		</ul>
  		
END;
		if (isset($_SESSION['user_connected'])) {
			if ($_SESSION['user_connected']) {

				$html = $html.<<<END

				<ul class="boutonConnexion">
					<a href="$urladdpost"><li class="btn btn-warning">Poster une photo</li></a> 
					<a href="$urlRestaurant"><li class="btn btn-light">Liste des restaurants</li></a>
					<a href="$urlpanier"><li class="btn btn-danger">Mon panier</li></a>
					
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

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="./javascript.js"></script>
	<script type="text/javascript">
	var checkMdp;//on déclare
window.onload = function() {
	var mdp_el = document.getElementById("mdpinscription"),
	mdp_el2 = document.getElementById("mdp2inscription");
	checkMdp = function checkMdp() {//redonner un nom est optionnel. C'est juste que je préfère
		if (mdp_el.value !== mdp_el2.value) {
			var msg = document.createTextNode("Les mots de passe ne sont pas identiques");
			document.getElementById("mdperror").appendChild(msg);
		}
		else {
			var msg = document.createTextNode("Les mots de passe sont identiques");
			document.getElementById("mdperror").appendChild(msg);
		}
	}
};


</script>
</body>
</html>
END;
		return $html;
	}
	
}