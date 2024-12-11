<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>AFFICHER</title>
</head>
<body>
<?php
session_start();
include "../php/fonctions_pays.php";
include "../php/fonctions_organise.php";
include "../php/fonctions_coupe_du_monde.php";
$_SESSION['ma_table'] = $_POST['table'];

switch ($_SESSION['ma_table']) {
    case 'g16_pays':
        $pays = getAllCountries();
        echo "<h1>Table g16_pays :</h1> <br><br><br>";
        echo "<a href='accueil.html'>Retour vers acceuil</a><br><br><br>";
        echo "<a href='insertion_pays.php'>Insertion dans la table g16_pays</a><br><br><br>";
        echo '<table><tr><th>pays_id</th><th>pays_nom</th><th>capitale</th><th>continent</th><th colspan="3" style="text-align: center">Action</th></tr>';
        foreach ($pays as $i => $v) {
            echo "<tr>";
            foreach ($v as $contenu)
                echo "<td>$contenu</td>";
            echo "<td><a href=\"../php/detailler.php?id=$i&t=g16_pays\" >Détailler</a></td>
                      <td><a href=\"TableModifierA.php?id=$i&t=g16_pays\" class ='orange'>Modifier</td>
                      <td><a href=\"../php/supprimer.php?id=$i&t=g16_pays\" class ='red'>Supprimer</a></td>";
            echo "</tr>";
        }
        echo '</table>';
        break;
    case 'g16_coupe_du_monde':
        $coupeDuMonde = getAllWinnerCountries();
        echo "<h1>Table g16_coupe_du_monde :</h1><br><br><br>";
        echo "<a href='../html/accueil.html'>Retour vers acceuil</a><br><br><br>";
        echo "<a href='../html/insertion_coupe_du_monde.php'>Insertion dans la table g16_coupe_du_monde</a><br><br><br>";
        echo '<table><tr><th>edition</th><th>année</th><th>catégorie</th><th>lieu</th><th>vainqueur_id</th><th colspan="3" style="text-align: center">Action</th></tr>';
        foreach ($coupeDuMonde as $i=>$v) {
            echo "<tr>";
            foreach ($v as $contenu)
                echo "<td>$contenu</td>";
            echo "<td><a href=\"../php/detailler.php?id=$i&t=g16_coupe_du_monde\">Détailler</a></td>
                      <td><a href=\"TableModifierA.php?id=$i&t=g16_coupe_du_monde\" class ='orange'>Modifier</td>
                      <td><a href=\"../php/supprimer.php?id=$i&t=g16_coupe_du_monde\" class = 'red'>Supprimer</a></td>";
            echo "</tr>";
        }
        echo '</table>';
        break;
    case 'g16_organise':
        echo "<h1>Table g16_organise :</h1><br><br><br>";
        echo "<a href='../html/accueil.html'>Retour vers acceuil</a><br><br><br>";
        $organise = getAllOrgCountries();
        echo "<a href='../html/insertion_organise.php'>Insertion dans la table g16_organise</a><br><br><br>";
        echo '<table><tr><th>année_org</th><th>id_org</th><th colspan="3" style="text-align: center">Action</th>';
        foreach ($organise as $i=>$v) {
            echo "<tr>";
            foreach ($v as $contenu)
                echo "<td>$contenu</td>";
            echo "<td><a href=\"../php/detailler.php?id=$i&t=g16_organise\">Détailler</a></td>
                      <td><a href=\"TableModifierA.php?id=$i&t=g16_organise\" class ='orange'>Modifier</td>
                      <td><a href=\"../php/supprimer.php?id=$i&t=g16_organise\" class='red'>Supprimer</a></td>";
            echo "</tr>";
        }
        echo '</table>';
        break;
} ?>
</body>
</html>
