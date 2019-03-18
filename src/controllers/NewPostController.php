<?php 

namespace weeat\controllers;

use weeat\views\NewPostView;
use weeat\models\Post;

class NewPostController
{
	
	function affiche()
	{
		if(isset($_SESSION['user_connected'])){
			$aff = new NewPostView();
			echo $aff->render();
		}else{
			$app = \Slim\Slim::getInstance();
			$app->redirect($app->urlFor('Accueil'));
		}
		
	}

	function enregistre(){

		if ($_FILES['mon_fichier']['error'] > 0) $erreur = "Erreur lors du transfert";

		$extension_upload = strtolower(substr(strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );
		$name = md5(uniqid(rand(), true));
		$nom="post/$name.{$extension_upload}";
		$resultat = move_uploaded_file($_FILES['mon_fichier']['tmp_name'],$nom);

		$post = new Post();
		$post->id_Post = filter_var($name, FILTER_SANITIZE_STRING);
		$post->Nom = filter_var($name, FILTER_SANITIZE_STRING);
		$post->extension = filter_var($extension_upload, FILTER_SANITIZE_STRING);
		$post->titre = filter_var($_POST["titre"], FILTER_SANITIZE_STRING);
		$post->Commentaire = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
		$post->id_utilisateur = $_SESSION['user_connected']["user_id"];

		$post->save();

		if ($resultat) echo "Transfert réussi";
		
			$app = \Slim\Slim::getInstance();
			$app->redirect($app->urlFor('Accueil'));
	}
}