<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
include "../php/fonctions_pays.php";
include "../php/fonctions_organise.php";
include "../php/fonctions_coupe_du_monde.php";
include "../util/makeTable.php";

$id = $_GET['id'];
$t = $_GET['t'];


switch ($t) {
    case 'g16_pays' :
        echo "<form action='TableContenu.php' method='post'>
        <input type='hidden' name='table' value='g16_pays'>
        <input type='submit' value='Retour vers g16_pays'>
        </form>
<h1>Modifier un pays :</h1><br>";

        if (isset($_GET['id'])) {
            // Récupérer l'identifiant du pays à modifier depuis l'URL

            // Récupérer tous les pays de la base de données
            $countries = getAllCountries()[$id];

            if (isset($countries)) {
                echo "<form action='TableModifierB.php' method='post'>
        <label>ID du pays :</label><br>
        <input type='hidden' name='TableModifierA' value='g16_pays'>
        <input type='text' name='pays_id' value='" . $countries['pays_id'] . "' readonly><br>
        <label>Nouveau nom du pays :</label><br>
        <input type='text' name='pays_nom' value='" . $countries['pays_nom'] . "' required><br>
        <label>Nouvelle capitale :</label><br>
        <input type='text' name='capitale' value='" . $countries['capitale'] . "' required><br>
        <label>Nouveau continent :</label><br>
        <input type='text' name='continent' value='" . $countries['continent'] . "' required><br><br>
        <input type='submit' value='Modifier'>
        </form>";
            } else {
                echo "Les détails du pays à modifier n'ont pas été trouvés.";
            }
        } else {
            echo "Identifiant du pays à modifier non spécifié.";
        }
        break;
    case 'g16_coupe_du_monde' :
        echo "<form action='TableContenu.php' method='post'>
        <input type='hidden' name='table' value='g16_coupe_du_monde'>
        <input type='submit' value='Retour vers g16_coupe_du_monde'>
        </form>
<h1>Modifier une coupe du monde :</h1><br>";
        if (isset($_GET['id'])) {
            // Récupérer l'identifiant du pays à modifier depuis l'URL
            $pays_id = $_GET['id'];

            $countries = getAllWinnerCountries()[$pays_id];
            if (isset($countries)) {
                echo "<form action='TableModifierB.php' method='post'>
        <label>Nouvelle année :</label><br>
                <input type='hidden' name='TableModifierA' value='g16_coupe_du_monde'>
        <input type='text' name='année' value='" . $countries['année'] . "' readonly><br>
        <label>Nouvelle édition :</label><br>
        <input type='number' name='édition' value='" . $countries['édition'] . "' required><br>
       <label>Catégorie :</label><br> 
        <input type='radio' name='catégorie' value='H' " . (isset($countries['catégorie']) && $countries['catégorie'] === 'H' ? "checked" : "") . " required> Homme
        <input type='radio' name='catégorie' value='F' " . (isset($countries['catégorie']) && $countries['catégorie'] === 'F' ? "checked" : "") . " required> Femme <br><br>
        <label>Nouveau lieu :</label><br>
        <input type='text' name='lieu' value='" . $countries['lieu'] . "' required><br><br>
                <label> ID Vainqueur :</label><br>
         <select name='vainqueur_id' required><br>";
                echo make_table('g16_pays', 'pays_id');
                echo "</select><br>
        <input type='submit' value='Modifier'>
        </form>";
            } else {
                echo "Les détails du pays à modifier n'ont pas été trouvés.";
            }
        } else {
            echo "Identifiant du pays à modifier non spécifié.";
        }
        break;
    case 'g16_organise':
        echo "<form action='TableContenu.php' method='post'>
        <input type='hidden' name='table' value='g16_organise'>
        <input type='submit' value='Retour vers g16_organise'>
        </form>
        <h1>Modifier une organisation :</h1><br>";

        if (isset($_GET['id'])) {
            // Récupérer l'identifiant du pays à modifier depuis l'URL
            $pays_id = $_GET['id'];

            // Récupérer tous les pays de la base de données
            $countries = getAllOrgCountries()[$pays_id];

            // Vérifier si le pays correspondant à l'identifiant spécifié existe
            if (isset($countries)) {
                // Récupérer les détails du pays

                // Afficher les informations du pays dans un formulaire de modification
                echo "<form action='TableModifierB.php' method='post'>
                <label>ID du pays :</label><br>
                <input type='hidden' name='TableModifierA' value='g16_organise'>
                <label>Id du pays organisateur :</label><br>
                <select type='text' name='id_org' required><br>";

                echo make_table("g16_pays", "pays_id");

                echo "</select><br>
                <label>Année de l'organisation :</label><br>
                <input type='number' name='année_org' value='". $countries['année_org'] ."' readonly><br>";
                echo "</select><br>
                <input type='submit' value='Modifier'>
                </form>";
            } else {
                echo "Les détails du pays à modifier n'ont pas été trouvés.";
            }
        } else {
            echo "Identifiant du pays à modifier non spécifié.";
        }
        break;
}
?>
</body>
</html>