<?php
//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Õige või vale?';
$label = 'Selleks et sokid jalga panna, tuleb enne kingad jalga panna.';

create_lugmot_form($wcode, $page, $maxp, $title, $label);