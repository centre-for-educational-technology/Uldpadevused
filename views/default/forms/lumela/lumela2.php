<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, 2);

$title = 'Mida on kasulik teha lugemise ajal?';
$labels = [
  'Loen keerulised kohad kiiresti läbi.',
  'Katkestan lugemise aeg-ajalt ja mõtlen, kuidas tekst võiks jätkuda.',
  'Esitan endale küsimusi teksti kohta ja vastan nendele.',
  'Pean arvestust, mitu lehekülge ma olen juba läbi lugenud.',
  'Loen läbi viimased laused, siis ma tean, kuidas tekst lõpeb.',
  'Leian loetud tekstist kõige olulisemad kohad.',
];

echo elgg_view_title($title);
form_view_radios($labels, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);