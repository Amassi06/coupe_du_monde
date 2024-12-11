<?php
include "../php/fonctions_pays.php";
include "../php/fonctions_organise.php";
include "../php/fonctions_coupe_du_monde.php";
$t = $_POST['TableModifierA'];
function check(array $val): bool
{
    foreach ($val as $v) {
        if (!isset($_POST[$v]) || empty($_POST[$v])) {
            return false;
        }
    }
    return true;
}
switch ($t) {
    case 'g16_pays':
        echo "<link rel='stylesheet' href='../css/style.css'>
<form action='TableContenu.php' method='post'>
    <input type='hidden' name='table' value='g16_pays'>
    <input type='submit' value='Retour vers g16_pays'>
</form>";


        $requiredFields = ['pays_id', 'pays_nom', 'capitale', 'continent'];

        if (check($requiredFields)) {
            $country_id = $_POST['pays_id'];
            $country_name = $_POST['pays_nom'];
            $capital = $_POST['capitale'];
            $continent = $_POST['continent'];

            if (updateCountry(['pays_nom' => $country_name, 'capitale' => $capital, 'continent' => $continent, 'pays_id' => $country_id])) {
                echo "Mise à jour réussie.";
            } else {
                echo "Une erreur est survenue lors de la mise à jour.";
            }
        } else {
            echo "Problème lors du remplissage des champs.";
        }
        break;
    case 'g16_coupe_du_monde':
        echo "<link rel='stylesheet' href='../css/style.css'>
<form action='TableContenu.php' method='post'>
    <input type='hidden' name='table' value='g16_coupe_du_monde'>
    <input type='submit' value='Retour vers g16_coupe_du_monde'>
</form>";


        $requiredFields = ['édition', 'année', 'catégorie', 'lieu','vainqueur_id'];

        if (check($requiredFields)) {
            $edition = $_POST['édition'];
            $location = $_POST['lieu'];
            $year = $_POST['année'];
            $winner_id = $_POST['vainqueur_id'];
            $category = $_POST['catégorie'];

            if (updateWinnerCountry(['édition' => $edition, 'lieu' => $location, 'année' => $year, 'vainqueur_id' => $winner_id, 'catégorie' => $category])) {
                echo "Mise à jour réussie.";
            } else {
                echo "Une erreur est survenue lors de la mise à jour.";
            }
        } else {
            echo "Problème lors du remplissage des champs.";
        }
        break;
    case 'g16_organise':
        echo "<link rel='stylesheet' href='../css/style.css'>
<form action='TableContenu.php' method='post'>
    <input type='hidden' name='table' value='g16_organise'>
    <input type='submit' value='Retour vers g16_organise'>
</form>";


        $requiredFields = ['année_org', 'id_org'];

        if (check($requiredFields)) {
            $year = $_POST['année_org'];
            $id_org = $_POST['id_org'];
            if (updateOrganise(['année_org' => $year, 'id_org' => $id_org])) {
                echo "Mise à jour réussie.";
            } else {
                echo "Une erreur est survenue lors de la mise à jour.";
            }
        } else {
            echo "Problème lors du remplissage des champs.";
        }
        break;
}