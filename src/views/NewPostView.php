<?php 

namespace weeat\views;
use weeat\views\GlobalView;

/**
 * 
 */
class NewPostView 
{
	
	function render()
	{
 		$app = \Slim\Slim::getInstance();
 		$html = GlobalView::header();
		$url = $app->urlFor('AddPost');
		$html = $html . <<<END
  			<div class="form-group text-center">
				<label for="Description"><h1 class="mt-5 mb-5  class="font-weight-bold">Ajouter une photo ou une vidéo</h1></label><br />


     <form method="post" action="$url" enctype="multipart/form-data">

     <label for="titre" class="font-weight-bold">Titre de votre publication :</label><br />

     <input type="text" name="titre" id="titre" /><br />

     <label for="description"  class="font-weight-bold mt-3">Description du Post (max. 240 caractères) :</label><br />

     <textarea name="description" id="description"></textarea><br />

     <label for="mon_fichier"  class="font-weight-bold mt-3">Fichier (Tout formats d'images ou de vidéos) :</label><br />

     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />

     <input type="file" name="mon_fichier" id="mon_fichier" /><br />

     <input type="submit" class="btn btn-success mb-5 mt-3" name="submit" value="Envoyer" />

</form>


END;
		$html = $html.GlobalView::footer();
		return $html;
	}
}