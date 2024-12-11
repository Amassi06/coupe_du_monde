<?php

function connexion(){
    $dbHost='localhost';
    $dbName='coupe_du_monde';
    $dbUser='postgres';
    $dbPassword='hello';

    $ptrDB = pg_connect("host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword");
    if (!$ptrDB) {
        echo '<p>Erreur lors de la connexion ...</p>';
        exit -1;
    }
//connexion etablie
    return $ptrDB;
}

