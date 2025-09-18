<?php
//error_log("page debut");
session_start();
include_once "../vendor/autoload.php";

use Slim\Factory\AppFactory; 
use Slim\Http\Request;

$app = AppFactory::create();
$imcControleur = new \App\Controleur\Controleur_Imc();

$app->get('/imc', [$imcControleur, 'imcAccueil']);
$app->post('/imc/imcreponse', [$imcControleur, 'imcReponse']);

$app->run();