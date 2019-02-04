<?php

namespace weeat\views;

class InscriptionView {
	
 	public function __construct() {}

 	public function render() {
 		$app = \Slim\Slim::getInstance();
		$url = $app->urlFor('TryInscription');
		$formulaire = GlobalView::header();
		if (isset($_GET['err'])) {
			if (strpos($_GET['err'], '1') !== FALSE) {
				$formulaire = $formulaire.'<p class="error">Adresse email déjà existante.</p>';
			}
			if (strpos($_GET['err'], '2') !== FALSE) {
				$formulaire = $formulaire.'<p class="error">Les deux mots de passe ne sont pas identiques.</p>';
			}
		}
		$formulaire = $formulaire.<<<END
		<div id>
			<form method="POST" action="$url" id="connexioninscription">
				<p>
					<label for="nom" >Nom: </label><input type="text" name="nom" id="nom" placeholder="Nom" required />
				</p>
				<p>
					<label for="prenom" >Prénom: </label><input type="text" name="prenom" id="prenom" placeholder="Prénom" required />
				</p>
				<p>
					<label for="email" >Adresse email : </label><input type="email" name="email" id="email" placeholder="Email" required />
				</p>
				<p>
					<label for="tel" >Téléphone : </label><input type="tel" name="tel" id="tel" placeholder="Téléphone" required />
				</p>
				<p>
					<label for="adresse" >Adresse : </label><input type="text" name="adresse" id="adresse" placeholder="Adresse" required />
				</p>
				<p>
					<label for="ville" >Ville : </label><input type="text" name="ville" id="ville" placeholder="Ville" required />
				</p>
				<p>
					<label for="codePostal" >Code postal : </label><input type="text" name="codePostal" id="codePostal" placeholder="Code postal" required />
				</p>
				<p>
					<label for="mdp">Mot de passe : </label><input type="password" name="password" id="mdp" placeholder="Mot de passe" required minlength="8"/>
				</p>
				<p>
					<label for="mdp2">Confirmez le mot de passe : </label><input type="password" name="password2" id="mdp2" placeholder="Mot de passe" required minlength="8"/>
				</p>
				<p>
					<button type="submit" name="valider_inscription" value="valid_inscription">S'inscrire</button>
				</p>
			</form>
		</div>
END;
		$formulaire = $formulaire.GlobalView::footer();
		return $formulaire;
	}
	
}