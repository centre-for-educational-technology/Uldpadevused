<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, 6);

$title = 'Mida on kasulik teha, kui ma ei saa mingist lausest aru?';
$labels = [
  'Loen läbi teksti viimase lause',
  'Loen kokku, kui palju lauseid pean veel lugema.',
  'Vaatan sõnastikust selles lauses olevate keerukate sõnade tähendusi.',
  'Hüppan sellest lausest üle.',
  'Loen väikese tekstiosa uuesti läbi.',
  'Püüan korrata seda lauset oma sõnadega.'
];

echo elgg_view_title($title);
form_view_radios($labels, $wcode, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);