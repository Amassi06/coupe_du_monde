<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>AFFICHER</title>
</head>
<body>
<?php
/**
 * Ce script PHP vérifie la soumission de données pour l'insertion des détails d'un pays.
 * Il inclut un fichier de fonctions dédiées pour effectuer l'insertion.
 * Si tous les champs requis sont remplis dans le formulaire, les données sont insérées dans la base de données.
 * Sinon, un message d'erreur est affiché indiquant que tous les champs doivent être remplis.
 */

include "fonctions_pays.php";

/**
 * Vérifie si les champs requis dans un formulaire sont tous remplis.
 *
 * Cette fonction parcourt un tableau de noms de champs requis et vérifie si chacun
 * d'eux est présent dans la superglobale $_POST et s'il n'est pas vide.
 *
 * @param array $val Un tableau contenant les noms des cha
 * ............000000000000000mps à vérifier
 * @return bool Renvoie true si tous les champs requis sont remplis, sinon false
 */
function check(array $val): bool
{
    foreach ($val as $v)
        if (!isset($_POST[$v]) || empty($_POST[$v]))
            return false;
    return true;
}
$requiredFields =['pays_id', 'pays_nom', 'capitale', 'continent'];
if (check($requiredFields)) {
    $country_id = $_POST['pays_id'];
    $country_name = $_POST['pays_nom'];
    $capital = $_POST['capitale'];
    $continent = $_POST['continent'];

    if (insertCountry(['pays_id' => $country_id, 'pays_nom' => $country_name, 'capitale' => $capital, 'continent' => $continent])) {
        echo "<form action='../html/TableContenu.php' method='post'>
             <input type='hidden' name='table' value='g16_pays'>
             <input type='submit' value='Retour vers g16_pays'>
</form>";
        echo "Insertion réussie.";
    } else {
        echo "Une erreur est survenue lors de l'insertion.";
    }
} else {
    echo "Probleme lors de remplissage des champs.";
}
?>
</body>
</html>


