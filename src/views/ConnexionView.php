<?php

namespace weeat\views;

class ConnexionView {
	
 	public function __construct() {}

 	public function render() {
 		$app = \Slim\Slim::getInstance();
		$url = $app->urlFor('TryConnexion');
		$formulaire = '';
		if (isset($_GET['err']) && $_GET['err'] == 1) {
			$formulaire = $formulaire.'<p>Adresse email ou mot de passe incorrectes.</p>';
		}
		$formulaire = $formulaire.<<<END
		<div>
			<form method="POST" action="$url" id="connexioninscription">
				<p>
					<label for="email" >Adresse email : </label><input type="email" name="user" id="email" placeholder="Email" required />
				</p>
				<p>
					<label for="mdp">Mot de passe : </label><input type="password" name="password" id="mdp" placeholder="Mot de passe" required />
				</p>
				<p>
					<button type="submit" name="valider_connexion" value="valid_connexion">Se connecter</button>
				</p>
			</form>
		</div>
END;
		$formulaire = $formulaire;
		return $formulaire;
	}
	
}