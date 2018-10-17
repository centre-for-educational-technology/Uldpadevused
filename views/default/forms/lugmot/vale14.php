<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Õige või vale?';
$label = 'Tiigrid on suured loomad, kellel on triibuline karvkate.';

create_lugmot_form($wcode, $page, $maxp, $title, $label);