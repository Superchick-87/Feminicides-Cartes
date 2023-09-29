<?php

/**
 * Trie JSON par date
 * Fonction de comparaison personnalisée pour trier par date
 * Réencodage du json trié
 * Format de date = yyyy-MM-dd accessible par la clé
 * @param [string] $a
 * @param [string] $b
 * @return void
 */

function comparerParDate($a, $b)
{
	$dateA = strtotime($a["Date"]);
	$dateB = strtotime($b["Date"]);

	if ($dateA == $dateB) {
		return 0;
	}
	return ($dateA < $dateB) ? -1 : 1;
}

// Trier le tableau par date
usort($data, 'comparerParDate');
// Tableau trié
$datass = json_encode($data, JSON_PRETTY_PRINT);
$datas = json_decode($datass, true);

/**
 * FIN
 */
