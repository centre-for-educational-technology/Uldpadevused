<?php

$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
form_view_hidden_fields($wcode, $page);

echo elgg_view_field([
  '#type' => 'text',
  '#label' => 'mõtle ise küsimus välja',
  'name' => 'emakeel',
  'required' => false
]);

echo elgg_view_field([
  '#type' => 'text',
  '#label' => 'mis on su küsimuse vastus?',
  'name' => 'emakeel2',
  'required' => false
]);

form_view_buttons($wcode, $page, $maxp);