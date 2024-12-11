<html DOCTYPE html>
<head>
    <link rel="stylesheet" href="../css/style.css" >
</head>
<body>


<?php
include "fonctions_pays.php";
include "fonctions_organise.php";
include "fonctions_coupe_du_monde.php";

$id = $_GET['id'];
$t = $_GET['t'];
switch ($t) {
    case 'g16_pays':
        echo"<form action='../html/TableContenu.php' method='post'>
             <input type='hidden' name='table' value='g16_pays'>
             <input type='submit' value='Retour vers g16_pays'>
</form>";
        $countriesTab = getAllCountries()[$id]['pays_id'];
        $delete = deleteCountry($countriesTab);
        if ($delete)
            echo "Operation réussie !";
        else
            echo "Erreur lors de la supression du pays";

        break;

    case 'g16_coupe_du_monde':
        echo"<form action='../html/TableContenu.php' method='post'>
             <input type='hidden' name='table' value='g16_coupe_du_monde'>
             <input type='submit' value='Retour vers g16_coupe_du_monde'>
</form>";
        $countriesTab = getAllWinnerCountries()[$id]['année'];
        $delete = deleteWinnerCountry($countriesTab);
        if ($delete)
            echo "Operation réussie !";
        else
            echo "Erreur lors de la supression de la coupe du monde";
        break;

    case 'g16_organise':
        echo"<form action='../html/TableContenu.php' method='post'>
             <input type='hidden' name='table' value='g16_organise'>
             <input type='submit' value='Retour vers g16_organise'>
</form>";
        $countriesTab = getAllOrgCountries()[$id]['id_org'];
        $delete = deleteOrganise($countriesTab);
        if ($delete)
            echo "Operation réussie !";
        else
            echo "Erreur lors de la supression du pays organisateur";
}?>

</body>

</html>
