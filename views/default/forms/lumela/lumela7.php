<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, 7);

$title = 'Mida on kasulik teha, kui tekst läheb keeruliseks?';
$labels = [
  'Loen keerulise koha kiiresti läbi',
  'Loen väikese osa tekstist uuesti läbi.',
  'Otsin üles kõik pikad sõnad',
  'Loen kokku, mitmest lausest ma aru ei saa.',
  'Loen kokku, kui palju lehekülgi pean veel lugema.',
  'Jutustan oma sõnadega, mida ma lugesin.'
];

echo elgg_view_title($title);
form_view_radios($labels, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);