<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Coupe du monde</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form action='../html/TableContenu.php' method='post'>
    <input type='hidden' name='table' value='g16_coupe_du_monde'>
    <input type='submit' value='Retour vers g16_coupe_du_monde'>
</form>
<h1>Ajouter une Coupe du Monde :</h1>
<br>
<form action="../php/inserer_coupe_du_monde.php" method="post">
    <label>Édition:</label><br>
    <input type="number" name="edition" required><br>

    <label>Lieu :</label><br>
    <input type="text" name="location" required><br>

    <label>Année :</label><br>
    <input type="number" name="year" max="9999" required><br>

    <label>ID du Vainqueur :</label><br>
    <select type="text" name="winner_id" required><br>
        <?php
        include "../util/makeTable.php";
        echo make_table("g16_pays", "pays_id");
        ?>
    </select><br>


    <label>Catégorie :</label><br>
    <input type="radio" name="category" value="H" required> Homme
    <input type="radio" name="category" value="F" required> Femme <br><br>

    <input type="submit" value="Ajouter">
</form>

</body>
</html>