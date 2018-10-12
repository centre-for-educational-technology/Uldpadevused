<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, 5);

$title = 'Mida on kasulik teha, kui ma ei saa mingist sõnast aru?';
$labels = [
  'Kirjutan selle sõna kaks korda läbi.',
  'Vaatan pilte.',
  'Kontrollin, kas see sõna on tekstis seletatud.',
  'Loen läbi teksti viimase lause.',
  'Vaatan teisi sõnu selle sõna ümber',
  'Mõtlen pealkirja peale.'
];

echo elgg_view_title($title);
form_view_radios($labels, $wcode, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);