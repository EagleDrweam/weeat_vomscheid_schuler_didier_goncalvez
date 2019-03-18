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


$tab = parse_ini_file('src/conf/conf.ini.txt');
$db = new DB(); 
$db->addConnection($tab);
$db->setAsGlobal();
$db->bootEloquent();

$app = new \Slim\Slim();
session_start();

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

$app->get('/fil_actu', function() {
    $cl = new NewPostController();
    $cl->affiche();
})->name('filActu');

$app->run();