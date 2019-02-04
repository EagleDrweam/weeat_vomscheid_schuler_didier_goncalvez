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
	<link rel="shortcut icon" type="image/x-icon" href="web/img/siteicone.ico" />
	<link rel="stylesheet" href="$rootUI/web/css/header_footer.css" />
END;
		/*foreach ($tabcss as $css) {
			$html = $html.'<link rel="stylesheet" href="'.$rootUI.'/web/css/'.$css.'" />';
		}*/
		$html=$html.<<<END

	</head>
	<body>

	<nav>
END;
		if (isset($_SESSION['user_connected'])) {
			if ($_SESSION['user_connected']) {
				$html = $html.<<<END
				<ul>
					<a href="$urlDeconnexion"><li class="bouton">Déconnexion</li></a>
				</ul>
END;
			}
		}
		else{
			$html = $html.<<<END
			<ul>
				<a href="$urlInscription"><li class="bouton">Inscription</li></a>
				<a href="$urlConnexion"><li class="bouton">Connexion</li></a>	
			</ul>

END;
		}
		$html = $html.<<<END
	</nav>

END;
		return $html;
	}
	
	public static function footer() {
		$html=<<<END
		</div>
		<footer>
			 <p>

			    Axel Didier - Gwendolyn VOMSCHEID - Pierre Goncalvez - Benoît Schuler

			 </p>

		</footer>
	</body>
</html>
END;
		return $html;
	}
	
}