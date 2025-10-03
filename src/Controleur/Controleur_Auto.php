<?php

namespace App\Controleur;

use App\Vue\Vue_BasDePage;
use App\Vue\Vue_CalculAuto;
use App\Vue\Vue_CalculImc;
use App\Vue\Vue_Entete;
use App\Vue\Vue_FormulaireAuto;
use App\Vue\Vue_FormulaireIMC;
use AppendIterator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use function App\Vue\donneBaseDePage;
use function App\Vue\donneEntete;

class Controleur_Auto
{
    public function autoAccueil(Request $request, Response $response, array $args): Response
    {
        //Il a cliqué sur changer Mot de passe. Cas pas fini
        $strHtml = Vue_Entete::donneHTML() .
            Vue_FormulaireAuto::donneHTML() .
            Vue_BasDePage::donneHTML();


        $response->getBody()->write($strHtml);
        return $response;

    }

    public function autoReponse(Request $request, Response $response, array $args): Response
    {
        $typePermis = $_POST['typePermis'];
        $jourSemaine = $_POST['jourSemaine'];
        $mutuelle = $_POST['mutuelle'];

        $tarif = 0;
        if ($typePermis == 'Permis A') {
            $tarif = 45;
        } else {
            $tarif = 50;
        }

        switch ($jourSemaine) {
            case "Lundi":
                $tarif = $tarif;
                break;
            case "Mardi":
                $tarif = $tarif * 0.9;
                break;
            case "Mercredi":
                $tarif = $tarif * 0.8;
                break;
            case "Jeudi":
                $tarif = $tarif * 0.95;
                break;
            case "Vendredi":
                $tarif = $tarif * 0.8;
                break;
            case "Samedi":
                $tarif = $tarif;
                break;
        }

        if ($mutuelle == 'oui') {
            $tarif = $tarif * 0.92;
        }
        $strHtml = Vue_Entete::donneHTML() .
            Vue_CalculAuto::donneHTML($tarif) .
            Vue_FormulaireAuto::donneHTML($typePermis, $jourSemaine,$mutuelle  ) .
            Vue_BasDePage::donneHTML();


        $response->getBody()->write($strHtml);
        return $response;

    }

}
