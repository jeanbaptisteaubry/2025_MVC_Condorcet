<?php
namespace App\Vue;
class Vue_FormulaireAuto
{

    static function donneHTML($typePermis = 'Permis A', $jourSemaine = "lundi", $mutuelle = "oui"): string
    {
        $str = "  <h1>Tarif auto ecole</h1>
        <form action='/auto/reponse' method='POST'>
            <label for='forfait'>Type Permis</label>
                <select name='typePermis' id='forfait'>
                    <option value='Permis A' ";
        if ($typePermis == 'Permis A')
            $str .= " selected";
        $str .= ">Permis A</option>
                    <option value='Permis B'";
        if ($typePermis == 'Permis B')
            $str .= " selected";
        $str .= "   >Permis B</option>
                </select>
            <br><br>
            <label for='heures'>Jour de la semaine</label>
                <select name='jourSemaine' id='heures'>
                    <option value='lundi' ";
        if ($jourSemaine == 'lundi')
            $str .= " selected";
        $str .= " >Lundi</option>
                    <option value='mardi' ";
        if ($jourSemaine == 'mardi')
            $str .= " selected";
        $str .= ">Mardi</option>
                    <option value='mercredi' ";
        if ($jourSemaine == 'mercredi')
            $str .= " selected";
        $str .= ">Mercredi</option>
                    <option value='jeudi' ";
        if ($jourSemaine == 'jeudi')
            $str .= " selected";
        $str .= ">Jeudi</option>
                    <option value='vendredi' ";
        if ($jourSemaine == 'vendredi')
            $str .= " selected";
        $str .= ">Vendredi</option>
                    <option value='samedi' ";
        if ($jourSemaine == 'samedi')
            $str .= " selected";
        $str .= ">Samedi</option>
                </select>
            <br><br>
            <label for='mutuelle'>Mutuelle</label>
                <input type='radio' id='oui' ";
        if ($mutuelle == 'oui')
            $str .= " checked";
        $str .= " name='mutuelle' value='oui' checked>
                <label for='oui'>Oui</label>
                <input type='radio' id='non'";
        if ($mutuelle == 'non')
            $str .= " checked";
        $str .= " name='mutuelle' value='non'>
                <label for='non'>Non</label>
                <br><br>
        <button type='submit'> Calculer tarif </button>
        </form>";
        return $str;
    }
}