<?php
include("fonctions_organise.php");
/**
 * Ce bloc de code illustre l'utilisation des fonctions liées à la gestion des pays organisateurs dans une base de données de la Coupe du Monde.
 *
 * - La fonction `getOrgCountryById` récupère les informations sur le pays organisateur de la Coupe du Monde en fonction de son identifiant.
 * - La fonction `getAllOrgCountries` récupère les informations sur tous les pays organisateurs de la Coupe du Monde.
 * - La fonction `insertOrgCountry` insère les informations d'un nouveau pays organisateur dans la base de données de la Coupe du Monde.
 * - La fonction `updateOrganise` met à jour les informations d'un pays organisateur existant dans la base de données de la Coupe du Monde.
 * - La fonction `deleteOrganise` supprime les informations d'un pays organisateur de la Coupe du Monde en fonction de son identifiant.
 */

print_r(getOrgCountryById('ITA'));
//print_r(getAllOrgCountries());
//insertOrgCountry(['id_org' => 'ALG', 'année_org' => 2030]);
//updateOrganise(['année_org'=>'2023','id_org'=>'ALG']);
//deleteOrganise('ALG');
