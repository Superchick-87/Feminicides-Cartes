<?php

/**
 * Trie JSON par string
 * Fonction de comparaison personnalisée pour trier par string
 * Réencodage du json trié accessible par la clé
 * @param [string] $a
 * @param [string] $b
 * @return void
 */

function comparerParNom($a, $b)
{
  return strcmp($a["Victime"], $b["Victime"]);
}
// Trier le tableau par nom
usort($data, 'comparerParNom');
// Tableau trié
$datass = json_encode($data, JSON_PRETTY_PRINT);
$datas = json_decode($datass, true);

/**
 * FIN
 */
