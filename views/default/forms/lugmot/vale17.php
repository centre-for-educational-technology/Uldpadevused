<?php
//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Õige või vale?';
$label = 'Sellist inimest, kes teeb teistele süüa, nimetatakse koristajaks.';

create_lugmot_form($wcode, $page, $maxp, $title, $label);