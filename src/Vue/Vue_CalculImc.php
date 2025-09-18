<?php
namespace App\Vue;
class Vue_CalculImc
{

    static function donneHTML($imc, $message): string
    {
        return "<h1>Calcul de l'IMC</h1>
       Votre Imc est de $imc : $message";
    }
}