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
		

	
	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    		<a class="navbar-brand" id="logo" href="#">WEEAT</a>
    		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      			<li class="nav-item active">
        			<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#">Commander</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#">Profil</a>
      			</li>
    		</ul>
    		<form class="form-inline my-2 my-lg-0">
      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    		</form>
  		
END;
		if (isset($_SESSION['user_connected'])) {
			if ($_SESSION['user_connected']) {
				$html = $html.<<<END
				<ul class="boutonConnexion">
					<a href="$urlDeconnexion"><li class="btn btn-danger">Déconnexion</li></a>
				</ul>
END;
			}
		}
		else{
			$html = $html.<<<END
			<ul class="boutonConnexion">
				<a href="$urlInscription"><li class="btn btn-success">Inscription</li></a>
				<a href="$urlConnexion"><li class="btn btn-success">Connexion</li></a>	
			</ul>

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
		
	<footer>
			
			    Axel Didier - Gwendolyn VOMSCHEID - Pierre Goncalvez - Benoît Schuler
			
	</footer>
</body>
</html>
END;
		return $html;
	}
	
}