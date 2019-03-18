<?php 

namespace weeat\views;
use weeat\views\GlobalView;
use weeat\models\Utilisateur;
use weeat\models\Post;



/**
 * 
 */
class ProfilView 
{
	
	function render()
	{
 		$app = \Slim\Slim::getInstance();
 		$html = GlobalView::header();
		$url = $app->urlFor('profil');
          $user = Post::select('*')->where('id_utilisateur', $_SESSION['user_connected'])


		foreach($profils as $profil){
               $html = $html . "<img src="

          }
		$html = $html.GlobalView::footer();
		return $html;
	}
}