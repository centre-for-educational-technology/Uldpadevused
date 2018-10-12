<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, 0);

$title = 'Sisesta oma andmed!';

echo elgg_view_title($title);
echo elgg_view_field([
  '#label' => 'Ees- ja perekonnanimi',
  '#type' => 'text',
  'name' => 'name',
  'value' => $_SESSION[$wcode.'name'],
  'required' => true
]);
echo elgg_view_field([
  '#label' => 'Klass',
  '#type' => 'text',
  'name' => 'grade',
  'value' => $_SESSION[$wcode.'grade'],
  'required' => true
]);

form_view_buttons($wcode, $page, $maxp);