<?php
include_once "../util/connexion.php";

/**
 * Récupère les informations sur le pays vainqueur de la Coupe du Monde en fonction de l'identifiant fourni.
 *
 * @param string $id L'identifiant du pays vainqueur.
 * @return array Les informations sur le pays vainqueur sous forme de tableau associatif.
 */
function getWinnerCountryById(string $id): array
{
    $ptrDB = connexion();
    $array_resultat = [];
    $query = "SELECT * FROM g16_coupe_du_monde WHERE vainqueur_id = $1";
    $stmt = pg_prepare($ptrDB, "get_winner_country", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête getWinnerCountryById()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    $result = pg_execute($ptrDB, "get_winner_country", array($id));

    if (!$result) {
        echo "Problème avec l'exécution de la requête getWinnerCountryById()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    while ($line = pg_fetch_assoc($result)) {
        array_push($array_resultat, $line);
    }

    pg_free_result($result);
    pg_close($ptrDB); // Fermeture de la connexion
    return $array_resultat;
}

function getWorldCupByYear(int $year): array{
    $ptrDB = connexion();
    $array_resultat = [];
    $query = "SELECT * FROM g16_coupe_du_monde WHERE année = $1";
    $stmt = pg_prepare($ptrDB, "get_world_cup_by_year", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête getWorldCupByYear()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    $result = pg_execute($ptrDB, "get_world_cup_by_year", array($year));

    if (!$result) {
        echo "Problème avec l'exécution de la requête getWorldCupByYear()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    while ($line = pg_fetch_assoc($result)) {
        array_push($array_resultat, $line);
    }

    pg_free_result($result);
    pg_close($ptrDB); // Fermeture de la connexion
    return $array_resultat;
}

/**
 * Récupère toutes les informations sur les pays vainqueurs de la Coupe du Monde.
 *
 * @return array Les informations sur les pays vainqueurs sous forme de tableau associatif.
 */
function getAllWinnerCountries(): array
{
    $ptrDB = connexion();
    $array_result = [];
    $query = "SELECT * FROM g16_coupe_du_monde ORDER BY année ASC";
    $stmt = pg_prepare($ptrDB, "get_all_winner_countries", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête getAllWinnerCountries()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    $result = pg_execute($ptrDB, "get_all_winner_countries", array());

    if (!$result) {
        echo "Problème avec l'exécution de la requête getAllWinnerCountries()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    while ($line = pg_fetch_assoc($result)) {
        array_push($array_result, $line);
    }

    pg_free_result($result);
    pg_close($ptrDB); // Fermeture de la connexion
    return $array_result;
}


/**
 * Insère les informations d'un pays vainqueur dans la base de données.
 *
 * @param array $assoc Les informations du pays vainqueur sous forme de tableau associatif.
 * @return bool TRUE si l'insertion a réussi, FALSE sinon.
 */

function insertWinnerCountry(array $assoc): bool
{
    $ptrDB = connexion();

    $edition = $assoc['édition'];
    $year = $assoc['année'];
    $category = $assoc['catégorie'];
    $location = $assoc['lieu'];
    $winner_id = $assoc['vainqueur_id'];

    $query = "INSERT INTO g16_coupe_du_monde(édition, année, catégorie, lieu, vainqueur_id) VALUES ($1, $2, $3, $4, $5)";
    $stmt = pg_prepare($ptrDB, "insert_winner_country", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête insertWinnerCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    $result = pg_execute($ptrDB, "insert_winner_country", array($edition, $year, $category, $location, $winner_id));

    if (!$result) {
        echo "Problème avec l'exécution de la requête insertWinnerCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    pg_close($ptrDB); // Fermeture de la connexion
    return TRUE;
}


/**
 * Met à jour les informations d'un pays vainqueur dans la base de données.
 *
 * @param array $assoc Les informations mises à jour du pays vainqueur sous forme de tableau associatif.
 * @return bool TRUE si la mise à jour a réussi, FALSE sinon.
 */
function updateWinnerCountry(array $assoc): bool
{
    $ptrDB = connexion();

    $edition = $assoc['édition'];
    $year = $assoc['année'];
    $category = $assoc['catégorie'];
    $location = $assoc['lieu'];
    $winner_id = $assoc['vainqueur_id'];

    $query = "UPDATE g16_coupe_du_monde SET édition =$1, catégorie=$2, lieu=$3, vainqueur_id =$4 WHERE année = $5";
    $stmt = pg_prepare($ptrDB, "update_winner_country", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête updateWinnerCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    $result = pg_execute($ptrDB, "update_winner_country", array($edition, $category, $location, $winner_id, $year));

    if (!$result) {
        echo "Problème avec l'exécution de la requête updateWinnerCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    pg_close($ptrDB); // Fermeture de la connexion
    return TRUE;
}


/**
 * Supprime les informations d'un pays vainqueur de la base de données en fonction de l'année.
 *
 * @param int $annee L'année(UNIQUE) du pays vainqueur à supprimer.
 * @return bool TRUE si la suppression a réussi, FALSE sinon.
 */
function deleteWinnerCountry(int $annee): bool
{
    $ptrDB = connexion();
    $query = "DELETE FROM g16_coupe_du_monde WHERE année = $1";
    $stmt = pg_prepare($ptrDB, "delete_winner_country", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête deleteWinnerCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    $result = pg_execute($ptrDB, "delete_winner_country", array($annee));

    if (!$result) {
        echo "Problème avec l'exécution de la requête deleteWinnerCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    pg_close($ptrDB); // Fermeture de la connexion
    return TRUE;
}


