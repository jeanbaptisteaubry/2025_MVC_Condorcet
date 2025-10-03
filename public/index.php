<?php
//error_log("page debut");
session_start();
include_once "../vendor/autoload.php";

use Slim\Factory\AppFactory; 
use Slim\Http\Request;

$app = AppFactory::create();
$imcControleur = new \App\Controleur\Controleur_Imc();
$autoControleur = new \App\Controleur\Controleur_Auto();

$app->get('/imc', [$imcControleur, 'imcAccueil']);
$app->post('/imc/imcreponse', [$imcControleur, 'imcReponse']);
$app->get('/auto', [$autoControleur, 'autoAccueil']);
$app->post('/auto/reponse', [$autoControleur, 'autoReponse']);
$app->run();