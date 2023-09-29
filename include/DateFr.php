<?php
function formatDate(DateTime $dt, string $format, string $language = 'en'): string
{
  $curTz = $dt->getTimezone();
  if ($curTz->getName() === 'Z') {
    //INTL don't know Z
    $curTz = new DateTimeZone('UTC');
  }

  $formatPattern = strtr($format, array(
    'D' => '{#1}',
    'l' => '{#2}',
    'M' => '{#3}',
    'F' => '{#4}',
  ));
  $strDate = $dt->format($formatPattern);
  $regEx = '~\{#\d\}~';
  while (preg_match($regEx, $strDate, $match)) {
    $IntlFormat = strtr($match[0], array(
      '{#1}' => 'E',
      '{#2}' => 'EEEE',
      '{#3}' => 'MMM',
      '{#4}' => 'MMMM',
    ));
    $fmt = datefmt_create(
      $language,
      IntlDateFormatter::FULL,
      IntlDateFormatter::FULL,
      $curTz,
      IntlDateFormatter::GREGORIAN,
      $IntlFormat
    );
    $replace = $fmt ? datefmt_format($fmt, $dt) : "???";
    $strDate = str_replace($match[0], $replace, $strDate);
  }

  return $strDate;
}
// $dt = date_create('2022-01-31');
// echo formatDate($dt, 'd F Y', 'fr') . '<br>';  //31 stycznia 2022
// echo formatDate(date_create('2022-01-31'), 'd F Y', 'fr');
