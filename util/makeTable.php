<?php

include_once "connexion.php";
function make_table(String $table_name,$col_name){
    $ptrDB = connexion();
    $options = '';
    $query = "SELECT $col_name FROM $table_name ORDER BY $col_name ASC ";
    $stmt = pg_prepare($ptrDB, "get_org_country_by_id", $query);

    if (!$stmt) {
        echo "Problème avec la préparation de la requête make_table()";
        pg_close($ptrDB); // Fermeture de la connexion
        exit(-1);
    }
    $result = pg_query($ptrDB, $query);
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            $optionValue = $row[$col_name];
            $options .= "<option value=\"$optionValue\">$optionValue</option>";
        }
        pg_free_result($result);
    } else {
        echo "Problème avec la récupération des options depuis la base de données.";
    }

    pg_close($ptrDB); // Fermeture de la connexion
    return $options;
}