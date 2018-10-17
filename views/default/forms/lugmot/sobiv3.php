<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Vali sulle sobiv vastus!';
$label = 'Ma olen hea lugeja.';

create_lugmot_form2($wcode, $page, $maxp, $title, $label);