<?php
include "fonctions_coupe_du_monde.php";

/**
 * Ce bloc de code illustre l'utilisation des fonctions liées à la gestion des pays vainqueurs dans une base de données de la Coupe du Monde.
 *
 * - La fonction `getWinnerCountryById` récupère les informations sur le pays vainqueur de la Coupe du Monde en fonction de son identifiant.
 * - La fonction `getAllWinnerCountries` récupère les informations sur tous les pays vainqueurs de la Coupe du Monde.
 * - La fonction `insertWinnerCountry` insère les informations d'un nouveau pays vainqueur dans la base de données de la Coupe du Monde.
 * - La fonction `updateWinnerCountry` met à jour les informations d'un pays vainqueur existant dans la base de données de la Coupe du Monde.
 * - La fonction `deleteWinnerCountry` supprime les informations d'un pays vainqueur de la Coupe du Monde en fonction de son année.
 */

print_r(getWinnerCountryById('FRA'));
print_r(getAllWinnerCountries());
insertWinnerCountry(['édition' => 16, 'lieu' => 'Alger', 'année' => 2030, 'vainqueur_id' => 'ALG', 'catégorie' => 'H']);
updateWinnerCountry(['édition' => 16, 'lieu' => 'Paris', 'année' => 2030, 'vainqueur_id' => 'FRA', 'catégorie' => 'F']);
deleteWinnerCountry(2099);
print_r(getWorldCupByYear(2023));
