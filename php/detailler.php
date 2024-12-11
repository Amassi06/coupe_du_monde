<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Détails</title>
</head>
<body><?php
include "fonctions_pays.php";
include "fonctions_organise.php";
include "fonctions_coupe_du_monde.php";

$id = $_GET['id'];
$t = $_GET['t'];
switch ($t) {
    case 'g16_pays':
        echo "<form action='../html/TableContenu.php' method='post'>
             <input type='hidden' name='table' value='g16_pays'>
             <input type='submit' value='Retour vers pays'>
</form>";
        $countriesTab = getAllCountries()[$id];
        echo "<h1><b>Contenu de $countriesTab[pays_nom]: </b></h1><br><br><br>";
        echo "<ul>";
        foreach ($countriesTab as $i => $v)
            echo "<li><b>$i :</b>$v</li><br>";
        echo "</ul>";
        break;

    case 'g16_coupe_du_monde':
        echo "<form action='../html/TableContenu.php' method='post'>
             <input type='hidden' name='table' value='g16_coupe_du_monde'>
             <input type='submit' value='Retour vers coupe du monde'>
</form>";
        $winnerCountries = getAllWinnerCountries()[$id];
        echo "<h1><b>Contenu de la coupe du monde $winnerCountries[année]: </b></h1><br><br><br>";
        echo "<ul>";
        foreach ($winnerCountries as $i => $v) {

            if ($i == 'vainqueur_id') {
                echo "<li><b>$i :</b>$v</li><br>";
                $country = getCountryById($v);
                echo "<ul>";
                foreach ($country as $l)
                    foreach ($l as $ci => $c)
                        echo "<li><b>$ci :</b>$c</li><br>";
                echo "</ul>";
            } else
                echo "<li><b>$i :</b>$v</li><br>";
        }
        echo "</ul>";
        break;
    case 'g16_organise':
        echo "<form action='../html/TableContenu.php' method='post'>
             <input type='hidden' name='table' value='g16_organise'>
             <input type='submit' value='Retour vers organise'>
</form>";
        $orgCountries = getAllOrgCountries()[$id];
        echo "<h1><b>Contenu de l'organisation du la coupe du monde  $orgCountries[année_org] :</b></h1><br><br><br>";
        echo "<ul>";
        foreach ($orgCountries as $i => $v) {
            if ($i == 'id_org') {
                echo "<li><b>$i :</b>$v</li><br>";
                $country = getCountryById($v);
                echo "<ul>";
                foreach ($country as $l)
                    foreach ($l as $ci => $c)
                        echo "<li><b>$ci :</b>$c</li><br>";
                echo "</ul>";
            } else {
                echo "<li><b>$i :</b>$v</li><br>";
                $year = getWorldCupByYear((int)$v);
                echo "<ul>";
                foreach ($year as $y)
                    foreach ($y as $yi => $m)
                        if ($yi == 'vainqueur_id') {
                            echo"<li><b>$yi :</b>$m</li><br>";
                            $country = getCountryById($m);
                            echo "<ul>";
                            foreach ($country as $l)
                                foreach ($l as $ci => $c)
                                    echo "<li><b>$ci :</b>$c</li><br>";
                            echo "</ul>";
                        } else {
                            echo "<li><b>$yi :</b>$m</li><br>";
                        }
                echo "</ul>";
            }
        }

        echo "</ul>";
        break;
} ?>
</body>
</html>
