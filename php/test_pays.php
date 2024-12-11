<?php
include "fonctions_pays.php";

/**
 * Ce bloc de code illustre l'utilisation des fonctions liées à la gestion des pays vainqueurs dans une base de données de la Coupe du Monde.
 *
 * - La fonction `getCountryById` récupère les informations sur le pays vainqueur de la Coupe du Monde en fonction de son identifiant.
 * - La fonction `getAllCountries` récupère les informations sur tous les pays vainqueurs de la Coupe du Monde.
 * - La fonction `insertCountry` insère les informations d'un nouveau pays vainqueur dans la base de données de la Coupe du Monde.
 * - La fonction `updateCountry` met à jour les informations d'un pays vainqueur existant dans la base de données de la Coupe du Monde.
 * - La fonction `deleteCountry` supprime les informations d'un pays vainqueur de la Coupe du Monde en fonction de son année.
 * - Remarque : On peut ajouter n'importe quel pays dans la table g16_Pays car elle n'a pas de clé étrangère.
 */

print_r(getCountryById('FRA'));
print_r(getAllCountries());
insertCountry(['pays_id'=>'ALG','pays_nom'=>'Algérie','capitale'=>'Alger','continent'=>'Afrique']);
updateCountry(['pays_id'=>'ALG','pays_nom'=>'Alg','capitale'=>'le havre','continent'=>'Europe']);
deleteCountry('ALG');
