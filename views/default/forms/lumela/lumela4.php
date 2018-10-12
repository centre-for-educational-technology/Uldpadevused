<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, 4);

$title = 'Mida on kasulik teha, et kontrollida, kas ma saan tekstist aru?';
$labels = [
  'Kontrollin, ega ma ei jätnud vahele ühtegi sõna.',
  'Loen pealkirja uuesti.',
  'Püüan leida jutust kõige olulisemad kohad.',
  'Jutustan enda sõnadega, mida lugesin.',
  'Küsin enda käest, kuidas tekst jätkub.',
  'Esitan endale teksti kohta küsimusi ja vastan nendele.'
];

echo elgg_view_title($title);
form_view_radios($labels, $wcode, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);