<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, 3);

$title = 'Mida on kasulik teha pärast lugemist?';
$labels = [
  'Esitan endale teksti kohta küsimusi ja vastan nendele.',
  'Loen kokku, mitmest sõnast ma aru ei saanud.',
  'Kontrollin, kas ma olen seda teksti varem lugenud.',
  'Küsin endalt, kas ma sain tekstist aru.',
  'Jutustan enda sõnadega, mida ma lugesin.',
  'Loen kokku, mitu lehekülge ma lugesin ilma vigu tegemata.',
];

echo elgg_view_title($title);
form_view_radios($labels, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);