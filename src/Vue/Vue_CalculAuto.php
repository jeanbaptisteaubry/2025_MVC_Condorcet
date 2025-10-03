<?php
namespace App\Vue;
class Vue_CalculAuto
{

    static function donneHTML($prix): string
    {
        return "<h1>Calcul de l'heure de conduite</h1>
       Le prix de l'heure est de $prix € ";
    }
}