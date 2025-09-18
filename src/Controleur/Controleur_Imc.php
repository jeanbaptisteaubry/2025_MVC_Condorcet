<?php

namespace App\Controleur;

use App\Vue\Vue_BasDePage;
use App\Vue\Vue_CalculImc;
use App\Vue\Vue_Entete;
use App\Vue\Vue_FormulaireIMC;
use AppendIterator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use function App\Vue\donneBaseDePage;
use function App\Vue\donneEntete;

class Controleur_Imc
{
    public function imcAccueil(Request $request, Response $response, array $args): Response
    {

        //Il a cliqué sur changer Mot de passe. Cas pas fini
        $strHtml = Vue_Entete::donneHTML() . 
        Vue_FormulaireIMC::donneHTML() . 
        Vue_BasDePage::donneHTML();


        $response->getBody()->write($strHtml);
        return $response;
    }


    public function imcReponse(Request $request, Response $response, array $args): Response
    {
        $poids = $_POST['poids'];
        $taille = $_POST['taille'];
        $imc = $poids / ($taille * $taille);

        //Maintenant, on veut avoir le message de santé dans une variable $message
        if ($imc < 16.5) {
            $message = "Dénutrition ou famine";
        } else if ($imc < 18.5) {
            $message = "Maigreur";
        } else if ($imc < 25) {
            $message = "Corpulence normale";
        } else if ($imc < 30) {
            $message = "Surpoids";
        } else
            $message = "Personne n'est gros ici !!!";


        //Il a cliqué sur changer Mot de passe. Cas pas fini
        $strHtml = Vue_Entete::donneHTML();

        $strHtml .= Vue_CalculImc::donneHTML($imc, $message);
         $strHtml .= Vue_FormulaireIMC::donneHTML($poids, $taille);

        $strHtml .= Vue_BasDePage::donneHTML();



        $response->getBody()->write($strHtml);
        return $response;
    }
}