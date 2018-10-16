<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page);

$title = 'Vali sulle sobiv vastus!';
$labels = [
  'Mulle meeldib koolis lugeda.'
];

echo elgg_view_title($title);
form_view_radios($labels, $wcode, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);