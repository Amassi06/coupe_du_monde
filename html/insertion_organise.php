<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Organisation</title>
</head>
<body>
<form action='TableContenu.php' method='post'>
    <input type='hidden' name='table' value='g16_organise'>
    <input type='submit' value='Retour vers g16_organise'>
</form><h1>Ajouter une organisation :</h1><br>
<form action="../php/inserer_organise.php" method="post">

    <label>Id du pays organisateur :</label><br>
    <select type="text" name="id_org" required><br>
        <?php
        include "../util/makeTable.php";
        echo make_table("g16_pays", "pays_id");
        ?>
    </select><br>

    <label>Année de l'organisation :</label><br>
    <select type="number" name="year_org" required><br>
        <?php
        echo make_table("g16_coupe_du_monde", "année");
        ?>
    </select><br>

    <input type="submit" value="Ajouter">
</form>
</body>
</html>