<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page);

$title = 'Vali sulle sobiv vastus!';
$label = 'Ma olen hea lugeja.';

echo elgg_view_title($title);
echo elgg_view_field([
  '#label' => $label,
  'name' => 'q',
  'value' => $_SESSION[$wcode.'p'.$page],
  'options' => [
    'Jah' => 'jah',
    'Ei' => 'ei'
  ],
  '#type' => 'radio',
  'align' => 'horizontal',
  'required' => true
]);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);