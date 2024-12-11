<?php
include_once "../util/connexion.php";
/**
 * Récupère les informations sur le pays organisateur de la Coupe du Monde en fonction de l'identifiant fourni.
 * @param string $id L'identifiant du pays organisateur.
 * @return array Les informations sur le pays organisateur sous forme de tableau associatif.
 */
function getOrgCountryById(string $id): array
{
    $ptrDB = connexion();
    $array_result = [];
    $query = "SELECT * FROM g16_organise WHERE id_org = $1";
    $stmt = pg_prepare($ptrDB, "get_org_country_by_id", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête getOrgCountryById()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    $result = pg_execute($ptrDB, "get_org_country_by_id", array($id));

    if (!$result) {
        echo "Problème avec la requête de getOrgCountryById()";
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
 * Récupère toutes les informations sur les pays organisateurs de la Coupe du Monde.
 *
 * @return array Les informations sur les pays organisateurs sous forme de tableau associatif.
 */
function getAllOrgCountries(): array
{
    $ptrDB = connexion();
    $array_result = [];
    $query = "SELECT * FROM g16_organise ORDER BY année_org ASC";
    $stmt = pg_prepare($ptrDB, "get_all_org_countries", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête getAllOrgCountries()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }

    $result = pg_execute($ptrDB, "get_all_org_countries", array());


    if (!$result) {
        echo "Problème avec la requête getAllOrgCountries()";
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
 * Insère les informations sur le pays organisateur dans la base de données.
 *
 * @param array $assoc Les informations sur le pays organisateur à insérer sous forme de tableau associatif.
 * @return bool TRUE si l'insertion est réussie, FALSE sinon.
 */
function insertOrgCountry(array $assoc): bool
{
    $ptrDB = connexion();
    $org_year = $assoc['année_org'];
    $org_id = $assoc['id_org'];

    $request = "INSERT INTO g16_organise(année_org, id_org) VALUES ($1, $2)";
    $stmt = pg_prepare($ptrDB, "insert_org_country", $request);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête insertOrgCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    $result = pg_execute($ptrDB, "insert_org_country", array($org_year, $org_id));

    if (!$result) {
        echo "Problème avec l'exécution de la requête insertOrgCountry()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    pg_close($ptrDB); // Fermeture de la connexion
    return TRUE;
}


/**
 * Met à jour l'année d'organisation d'un pays organisateur dans la base de données.
 *
 * @param array $assoc Les informations sur le pays organisateur à mettre à jour sous forme de tableau associatif.
 * @return bool TRUE si la mise à jour est réussie, FALSE sinon.
 */
function updateOrganise(array $assoc): bool
{
    $ptrDB = connexion();
    $org_year = $assoc['année_org'];
    $org_id = $assoc['id_org'];

    $query = "UPDATE g16_organise SET id_org =$2 WHERE année_org =$1";
    $stmt = pg_prepare($ptrDB, "update_organise", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête updateOrganise()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    $result = pg_execute($ptrDB, "update_organise", array($org_year, $org_id));

    if (!$result) {
        echo "Problème avec l'exécution de la requête updateOrganise()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    pg_close($ptrDB); // Fermeture de la connexion
    return TRUE;
}

/**
 * Supprime les informations sur le pays organisateur de la base de données en fonction de l'identifiant fourni.
 *
 * @param string $id L'identifiant du pays organisateur à supprimer.
 * @return bool TRUE si la suppression est réussie, FALSE sinon.
 */
function deleteOrganise(string $id): bool
{
    $ptrDB = connexion();
    $query = "DELETE FROM g16_organise WHERE id_org = $1";
    $stmt = pg_prepare($ptrDB, "delete_organise", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête deleteOrganise()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    $result = pg_execute($ptrDB, "delete_organise", array($id));

    if (!$result) {
        echo "Problème avec l'exécution de la requête deleteOrganise()";
        pg_close($ptrDB); // Fermeture de la connexion
        return FALSE;
    }

    pg_close($ptrDB); // Fermeture de la connexion
    return TRUE;
}
