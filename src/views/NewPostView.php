<?php 

namespace weeat\views;

/**
 * 
 */
class NewPostView 
{
	
	function render()
	{
 		$app = \Slim\Slim::getInstance();
		$url = $app->urlFor('AddPost');
		$html = <<<END
		<label for="Descripption">Page de téléchargement de Photo/Video</label><br />

		<form method="post" action="$url" enctype="multipart/form-data">

     <label for="mon_fichier">Fichier (tous formats d'image ou de video) :</label><br />

     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />

     <input type="file" name="mon_fichier" id="mon_fichier" /><br />

     <label for="titre">Titre du Post (max. 50 caractères) :</label><br />

     <input type="text" name="titre" value="Titre du Post" id="titre" /><br />

     <label for="description">Description du Post (max. 240 caractères) :</label><br />

     <textarea name="description" id="description"></textarea><br />

     <input type="submit" name="submit" value="Envoyer" />

</form>


END;

		return $html;
	}
}