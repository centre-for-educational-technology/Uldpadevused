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
  '#label' => 'Sugu',
  '#type' => 'select',
  'options_values' => array(
    'mees' => 'Mees',
    'naine' => 'Naine'
  ),
  'name' => 'gender',
  'value' => $_SESSION[$wcode.'gender'],
  'required' => true
]);
echo elgg_view_field([
  '#label' => 'Vanus',
  '#type' => 'dropdown',
  'options_values' => array(
    '7' => '7', '8' => '8', '9' => '9', '10' => '10',
    '11' => '11', '12' => '12', '13' => '13', '14' => '14'
  ),
  'name' => 'age',
  'value' => $_SESSION[$wcode.'age'],
  'required' => true
]);

form_view_buttons($wcode, $page, $maxp);