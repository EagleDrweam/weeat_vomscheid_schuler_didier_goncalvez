<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use weeat\controllers\InscriptionControllers;
use weeat\controllers\ConnexionController;
use weeat\controllers\AccueilController;
use weeat\controllers\DeconnexionController;


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


$app->run();