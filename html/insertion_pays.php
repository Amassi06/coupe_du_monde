<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Insertion de pays</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form action='TableContenu.php' method='post'>
    <input type='hidden' name='table' value='g16_pays'>
    <input type='submit' value='Retour vers g16_pays'>
</form>
<h1>Ajouter un pays :</h1></br>
<form action="../php/inserer_pays.php" method="post">
    <label>Identifiant du pays :</label><br>
    <input type="text" name="pays_id" maxlength="10" required><br>

    <label>Nom du pays :</label><br>
    <input type="text" name="pays_nom" required><br>

    <label>Capitale :</label><br>
    <input type="text" name="capitale" required><br>

    <label>Continent :</label><br>
    <input type="text" name="continent" required><br><br>

    <input type="submit" value="Ajouter">
</form>

</body>
</html>
