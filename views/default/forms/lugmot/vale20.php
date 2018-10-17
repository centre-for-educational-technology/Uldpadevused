<?php
//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Õige või vale?';
$label = 'Kiirabiautoga veetakse vanu katkisi saapaid.';

create_lugmot_form($wcode, $page, $maxp, $title, $label);