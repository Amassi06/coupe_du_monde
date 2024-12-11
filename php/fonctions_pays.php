<?php
include_once "../util/connexion.php";

/**
 * Récupère les informations d'un pays par son identifiant.
 *
 * @param string $id Identifiant du pays
 * @return array Les informations du pays sous forme de tableau associatif
 */
function getCountryById(string $id): array
{

    $ptrDB = connexion();
    $array_result = [];
    $query = "SELECT * FROM g16_pays WHERE pays_id = $1";
    $stmt = pg_prepare($ptrDB, "get_country", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête getCountryById()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    $result = pg_execute($ptrDB, "get_country", array($id));

    if (!$result) {
        echo "Problème avec l'exécution de la requête getCountryById()";
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
 * Récupère toutes les informations de tous les pays présents dans la base de données.
 *
 * @return array Liste de tous les pays
 */
function getAllCountries(): array
{
    $ptrDB = connexion();
    $array_result = [];
    $query = "SELECT * FROM g16_pays ORDER BY pays_id ASC";

    $stmt = pg_prepare($ptrDB, "get_all__countries", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête getAllCountries()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    $result = pg_execute($ptrDB, "get_all__countries", array());

    if (!$result) {
        echo "Problème avec l'exécution de la requête getAllCountries()";
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
 * Insère les informations d'un nouveau pays dans la base de données.
 *
 * @param array $assoc Tableau associatif contenant les informations du pays à insérer
 * @return bool Renvoie TRUE si l'insertion est réussie, FALSE sinon
 */

function insertCountry(array $assoc): bool
{
    $ptrDB = connexion();

    $country_id = $assoc['pays_id'];
    $country_name = $assoc['pays_nom'];
    $capital = $assoc['capitale'];
    $continent = $assoc['continent'];

    $query = "INSERT INTO g16_pays(pays_id, pays_nom, capitale, continent) VALUES ($1,$2,$3,$4)";
    $stmt = pg_prepare($ptrDB, "insert_country", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête insertCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    $result = pg_execute($ptrDB, "insert_country", array( $country_id,$country_name,$capital,$continent));

    if (!$result) {
        echo "Problème avec l'exécution de la requête insertCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    pg_close($ptrDB); // Fermeture de la connexion
    return TRUE;
}

/**
 * Met à jour les informations d'un pays existant dans la base de données.
 *
 * @param array $assoc Tableau associatif contenant les informations mises à jour du pays
 * @return bool Renvoie TRUE si la mise à jour est réussie, FALSE sinon
 */
function updateCountry(array $assoc): bool
{
    $ptrDB = connexion();

    $country_id = $assoc['pays_id'];
    $country_name = $assoc['pays_nom'];
    $capital = $assoc['capitale'];
    $continent = $assoc['continent'];

    $query = "UPDATE g16_pays SET pays_nom=$1, capitale=$2, continent=$3 WHERE pays_id=$4";
    $stmt = pg_prepare($ptrDB, "update_country", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête updateCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    $result = pg_execute($ptrDB, "update_country", array($country_name, $capital, $continent, $country_id));
    if (!$result) {
        echo "Problème avec l'exécution de la requête updateCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }
    pg_close($ptrDB); // Fermeture de la connexion
    return TRUE;
}

/**
 * Supprime un pays de la base de données par son identifiant.
 *
 * @param string $id Identifiant du pays à supprimer
 * @return bool Renvoie TRUE si la suppression est réussie, FALSE sinon
 */

function deleteCountry(string $id): bool
{
    $ptrDB = connexion();
    $query = "DELETE FROM g16_pays WHERE pays_id = $1";
    $stmt = pg_prepare($ptrDB, "delete_country", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête deleteCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    $result = pg_execute($ptrDB, "delete_country", array($id));

    if (!$result) {
        echo "Problème avec l'exécution de la requête deleteCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    pg_close($ptrDB); // Fermeture de la connexion
    return TRUE;
}



