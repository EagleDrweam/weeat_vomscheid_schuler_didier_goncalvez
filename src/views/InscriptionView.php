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
<div>
	<form method="POST" action="$url" id="connexioninscription">
		<div class="inscriptionForm">
			<div class="row">
			
				<div class="col-md-6">
					<p>
						<label for="nom" >Nom: </label><input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required />
					</p>
				</div>
				<div class="col-md-6">
					<p>
						<label for="prenom" >Prénom: </label><input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom" required />
					</p>
				</div>
				<div class="col-md-12">
				<p>
					<label for="email" >Adresse email : </label><input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
				</p>
				</div>
				<div class="col-md-6">
				<p>
					<label for="tel" >Téléphone : </label><input type="tel" name="tel" id="tel" class="form-control" placeholder="Téléphone" required />
				</p>
				</div>
				<div class="col-md-6">
				<p>
					<label for="adresse" >Adresse : </label><input type="text" name="adresse" id="adresse" class="form-control" placeholder="Adresse" required />
				</p>
				</div>
				<div class="col-md-6">
				<p>
					<label for="ville" >Ville : </label><input type="text" name="ville" id="ville" class="form-control" placeholder="Ville" required />
				</p>
				</div>
				<div class="col-md-6">
				<p>
					<label for="codePostal" >Code postal : </label><input type="text" name="codePostal" id="codePostal" class="form-control" placeholder="Code postal" required />
				</p>
				</div>
				<div class="col-md-6">
				<p>
					<label for="mdp">Mot de passe : </label><input type="password" name="password" id="mdp" class="form-control" placeholder="Mot de passe" required minlength="8"/>
				</p>
				</div>
				<div class="col-md-6">
				<p>
					<label for="mdp2">Confirmez le mot de passe : </label><input type="password" name="password2" id="mdp2" class="form-control" placeholder="Mot de passe" required minlength="8"/>
				</p>
				</div>
				<div class="col-md-6">
				<p>
					<button type="submit" name="valider_inscription" value="valid_inscription" class="btn btn-primary">S'inscrire</button>
				</p>
				</div>
			</div>
		</div>
	</form>
</div>
	
END;
		$formulaire = $formulaire.GlobalView::footer();
		return $formulaire;
	}
	
}