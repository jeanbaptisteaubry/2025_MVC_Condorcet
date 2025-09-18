<?php
namespace App\Vue;
class Vue_FormulaireIMC {

static function donneHTML($poids =90, $taille=180):string
{ 
return "<form action='/imc/imcreponse' method='POST'>
            <label for='poids'>Poids (en kg) :</label>
            <input type='number' id='poids' value='$poids' name='poids' step='0.1' required>
            <br><br>
            <label for='taille'>Taille (en m) :</label> 
            <input type='number' id='taille' value='$taille' name='taille' step='0.01' required>
            <br><br>
            <input type='submit' value='Calculer l'IMC'>
            <button type='submit'> Calculer IMC </button>

        </form>";
}
}