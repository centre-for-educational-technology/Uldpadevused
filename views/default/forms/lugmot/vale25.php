<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Õige või vale?';
$label = 'Enne kui sa õhtul magama lähed, tuleb kindlasti ära pesta hambad.';

create_lugmot_form($wcode, $page, $maxp, $title, $label);