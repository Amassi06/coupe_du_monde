<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>AFFICHER</title>
</head>
<body>
<?php
/**
 * Ce script PHP vérifie la soumission de données pour l'insertion des détails d'une organisation.
 * Il inclut un fichier de fonctions dédiées pour effectuer l'insertion.
 * Si tous les champs requis sont remplis dans le formulaire, les données sont insérées dans la base de données.
 * Sinon, un message d'erreur est affiché indiquant que tous les champs doivent être remplis.
 */

include "fonctions_organise.php";

/**
 * Vérifie si les champs requis dans un formulaire sont tous remplis.
 *
 * Cette fonction parcourt un tableau de noms de champs requis et vérifie si chacun
 * d'eux est présent dans la superglobale $_POST et s'il n'est pas vide.
 *
 * @param array $val Un tableau contenant les noms des champs à vérifier
 * @return bool Renvoie true si tous les champs requis sont remplis, sinon false
 */

function check(array $val): bool
{
    foreach ($val as $v)
        if (!isset($_POST[$v]) || empty($_POST[$v]))
            return false;
    return true;
}
$requiredFields =['id_org', 'year_org'] ;
if (check($requiredFields)) {
    if (insertOrgCountry(['id_org' => $_POST['id_org'], 'année_org' => $_POST['year_org']])) {
        echo "<form action='../html/TableContenu.php' method='post'>
        <input type='hidden' name='table' value='g16_organise'>
        <input type='submit' value='Retour vers g16_organise'>
        </form>";
        echo "Insertion réussie.";
    } else {
        echo "Veuillez ajouter le pays requis sur la page \"Pays\" et assurez-vous d\'inclure une Coupe du Monde sur la page \"Coupe du monde\".\\nMerci de votre compréhension.')";
    }
} else {
    echo "Probleme lors de remplissage des champs.";
}
?>
</body>
</html>
