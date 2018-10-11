<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, 1);

$title = 'Mida on kasulik teha enne lugemist?';
$labels = [
  'Mõtlen, mida ma selle teema kohta juba tean.',
  'Esitan küsimusi teksti kohta ja vastan nendele.',
  'Loen läbi viimase lause, siis ma tean, kuidas tekst lõpeb.',
  'Mõtlen, millest see tekst võiks rääkida.',
  'Vaatan hoolikalt pealkirja ja pilti.',
  'Leian tekstist kõige olulisemad sõnad.'
];

echo elgg_view_title($title);
form_view_radios($labels, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);