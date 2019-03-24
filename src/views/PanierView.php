<?php 

namespace weeat\views;
use weeat\views\GlobalView;
use weeat\models\Panier;
use weeat\models\Plat;
use weeat\models\Utilisateur;
use weeat\models\Invite;

/**
 * 
 */
class PanierView 
{
	
	function render()
	{
 		$app = \Slim\Slim::getInstance();
 		$html = GlobalView::header();
 		$urlsupppanier = $app->urlFor('SuppPlat');
 		$urlpayer = $app->urlFor('Payer');
 		$urlami = $app->urlFor('Ami');
 		$id = Invite::where('invite', '=', $_SESSION['user_connected']['user_id'])->first();

 		if(is_null($id)){
			$paniers = Panier::where('id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->get();
 		}else{
			$paniers = Panier::where('id_invitation', '=', $id->owner)->get();
			$pan = Panier::where('id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->get();
 		}

 		$utilisateurs = Utilisateur::where('id_utilisateur', '!=', $_SESSION['user_connected']['user_id'])->get();
 		$prixTotal = 0;

 		$html = $html .<<<END

 		<h1 class='text-center mt-5 mb-3'>Ma commande</h1>

 		<p class='text-center mb-5'><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
		  Inviter des amis +
		</button></p>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<div class="modal-body">
		    		<h1 class='text-center'>Liste de mes amis</h1>
		    			<form method='POST' action='$urlami'>
		   

END;
		$i =0;
		foreach($utilisateurs as $user){
			$i++;
			
				$html = $html . "<input name='test$i' type='checkbox' class='mb-2' value='$user->id_utilisateur'> $user->prenom $user->nom</input><br>
									";
		}






		$html = $html .<<<END
		<input name='nombre' type='hidden' value='$i';
		<p class="text-center"><button type='submit' class='btn btn-warning'>Inviter</button></p>
		</div></div></div></div>

 		<table class="table table-striped  table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">Photo du plat</th>
		      <th scope="col">Plat</th>
		      <th scope="col">Prix</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
END;

 		foreach($paniers as $panier){
 			$plat = Plat::where('id_plat', '=', $panier->id_plat)->first();
 			$html = $html . "<tr>
      					<td class='text-center'><img height='50px' src='./web/image/" . $plat->photo_plat . " ' /></td>
      					<td>" . $plat->nom_plat . "</td>
      					<td>" . $plat->prix_plat . " €</td>
      					<td class='text-center'> <form method='POST' action='$urlsupppanier'>
	      						   <input type='hidden' name='supppanier' value='$panier->id_plat' />
	      						   <button type='submit' class='btn btn-danger'>Supprimer le plat</button>
	    	</form></td>
      			</tr>";
      		$prixTotal = $prixTotal + $plat->prix_plat;
 		}

 		$prix = 0;

 		if(!is_null($pan)){
 			foreach ($pan as $p) {
 				$plat = Plat::where('id_plat', '=', $p->id_plat)->first();
 				$prix=$prix + $plat->prix_plat;
 			}
 			$html = $html.<<<END
		<tr>
 			<td></td>
 			<td class='text-center'><b>Votre part à payer :</b></td>
 			<td><b> $prix € </b></td>
 			<td></td>
 		</tr>
END;
 		}



 		$html = $html.<<<END
 		<tr>
 			<td></td>
 			<td class='text-center'><b>Le prix total est de :</b></td>
 			<td><b> $prixTotal € </b></td>
 			<td></td>
 		</tr>

 		</tbody>
		</table>

		<form method='POST' action='$urlpayer'>
	      						   <p class="text-center"><button type='submit' class='btn btn-warning'>Effectuer le paiement de ma commande</button></p>
	    	</form>
END;

		$html = $html.GlobalView::footer();
		return $html;
	}

	function paiementEffectue() {
		$app = \Slim\Slim::getInstance();
 		$html = GlobalView::header();

 		$html = $html.<<<END

 		<h4 class='text-center mt-5 mb-2'>Félicitation, votre commande est dorénavant en cours de livraison</h4>
 		<h5 class='text-center'>Vous allez être redirigez vers la liste des restaurants dans 5s</h5>


END;

		header('Refresh: 5; URL='.$app->urlFor('ListeRestaurant'));

 		$html = $html.GlobalView::footer();
		return $html;
	}
}