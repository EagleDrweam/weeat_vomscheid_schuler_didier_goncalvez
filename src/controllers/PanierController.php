<?php 

namespace weeat\controllers;

use weeat\views\PanierView;
use weeat\models\Panier;
use weeat\models\Utilisateur;
use weeat\models\Invite;


class PanierController
{
	
	public function affiche() {
		$av = new PanierView();
		echo $av->render();	
	}

	public function supprimer(){
		$app = \Slim\Slim::getInstance();
		$panier = Panier::where('id_plat', '=', $_POST["supppanier"] , 'and', 'id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->first();
		$panier->delete();
		$av = new PanierView();
		echo $av->render();
	}

	public function payer(){
		$app = \Slim\Slim::getInstance();
		$paniers = Panier::where('id_utilisateur', '=', $_SESSION['user_connected']['user_id'])->get();

		foreach($paniers as $panier){
			$panier->delete();
		}


 		$id2 = Invite::where('invite', '=', $_SESSION['user_connected']['user_id'])->get();

		foreach($id as $i){
			$i->delete();
		}


		$av = new PanierView();
		echo $av->paiementEffectue();
	}

	public function ami(){
		$i = $_POST["nombre"];
		for($t=1;$t<=$i; $t++){
			if(isset($_POST["test$t"])){
					$invite = new Invite();
					$invite->owner = $_SESSION['user_connected']['user_id'];
					$invite->invite = $_POST["test$t"];
					$invite->save();

				$paniers = Panier::where('id_utilisateur', '=', $_POST["test$t"])->get();
				foreach ($paniers as $panier) {
					$panier->id_invitation = $_SESSION['user_connected']['user_id'];
					$panier->update();
				}		
			}
		}

		$invite = new Invite();
		$invite->owner = $_SESSION['user_connected']['user_id'];
		$invite->invite = $_SESSION['user_connected']['user_id'];
		$invite->save();


		$av = new PanierView();
		echo $av->render();	
	}
}
