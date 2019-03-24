<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use weeat\controllers\InscriptionControllers;
use weeat\controllers\ConnexionController;
use weeat\controllers\AccueilController;
use weeat\controllers\DeconnexionController;
use weeat\controllers\ListeRestaurantController;
use weeat\controllers\NewPostController;
use weeat\controllers\FilActuController;
use weeat\controllers\MonProfilController;
use weeat\controllers\InfoUtilisateurController;
use weeat\controllers\ListePlatController;
use weeat\controllers\FavoriController;
use weeat\controllers\PanierController;




$tab = parse_ini_file('src/conf/conf.ini.txt');
$db = new DB(); 
$db->addConnection($tab);
$db->setAsGlobal();
$db->bootEloquent();

$app = new \Slim\Slim();
session_start();

if (isset($_SESSION['user_connected'])) {
			if ($_SESSION['user_connected']) {
				$app->get('/', function() {
			    $cl = new FilActuController();
			    $cl->affiche();
			})->name('filActu');
			}
		}
$app->get('/', function() {
					$ac = new AccueilController();
					$ac->affiche();
				})->name('Accueil');

$app->get('/inscription', function() {
    $cl = new InscriptionControllers();
    $cl->affichePageInscr();
})->name('Inscription');

$app->post('/inscriptionCompte', function() {
    $cl = new InscriptionControllers();
    $cl->inscrire();
})->name('TryInscription');

$app->get('/connect', function() {
    $cl = new ConnexionController();
    $cl->affichePageCo();
})->name('Connexion');

$app->post('/connexionCompte', function() {
    $cc = new ConnexionController();
    $cc->connecter();
})->name('TryConnexion');

$app->get('/disconnect', function() {
    $cl = new DeconnexionController();
    $cl->deconnecter();
})->name('Deconnexion');

$app->get('/liste_restaurant', function() {
    $cl = new ListeRestaurantController();
    $cl->affiche();
})->name('ListeRestaurant');



$app->get('/new_post', function() {
    $cl = new NewPostController();
    $cl->affiche();
})->name('post');

$app->post('/addPost', function() {
    $cl = new NewPostController();
    $cl->Enregistre();
})->name('AddPost');

$app->get('/mon_profil', function() {
    $cl = new MonProfilController();
    $cl->affiche();
})->name('MonProfil');

$app->get('/modifier', function() {
    $cl = new InfoUtilisateurController();
    $cl->affiche();
})->name('modifier');

$app->post('/modifierUser', function() {
    $cl = new InfoUtilisateurController();
    $cl->modifier();
})->name('ModifyUser');

$app->get('/liste_plat', function() {
    $cl = new ListePlatController();
    $cl->affiche();
})->name('ListePlat');

$app->post('/liste_plat', function() {
    $cl = new ListePlatController();
    $cl->panier();
})->name('ListePlatPan');

$app->post('/liste_plat_fav', function() {
    $cl = new ListePlatController();
    $cl->favori();
})->name('ListePlatFav');

$app->post('/supp_liste_plat_fav', function() {
    $cl = new ListePlatController();
    $cl->supp();
})->name('SuppListePlatFav');

$app->get('/mes_favoris', function() {
    $cl = new FavoriController();
    $cl->affiche();
})->name('Favori');

$app->post('/mes_favoris_supp', function() {
    $cl = new FavoriController();
    $cl->supprimer();
})->name('Supp');

$app->get('/mon_panier', function() {
    $cl = new PanierController();
    $cl->affiche();
})->name('Panier');

$app->post('/mon_panier_supp', function() {
    $cl = new PanierController();
    $cl->supprimer();
})->name('SuppPlat');

$app->post('/payer', function() {
    $cl = new PanierController();
    $cl->payer();
})->name('Payer');

$app->post('/love', function() {
                $cl = new FilActuController();
                $cl->love();
            })->name('Love');

$app->post('/mon_panier_ami', function() {
    $cl = new PanierController();
    $cl->ami();
})->name('Ami');

$app->run();