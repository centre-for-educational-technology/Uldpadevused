<?php

$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
form_view_hidden_fields($wcode, $page);

echo elgg_view_field([
  '#type' => 'text',
  '#label' => 'kas sulle meeldivad bussid?',
  'name' => 'bussid',
  'value' => $_COOKIE['ws1-bussid[01]'],
  'required' => false
]);

form_view_buttons($wcode, $page, $maxp);