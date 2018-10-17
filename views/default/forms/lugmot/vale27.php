<?php
//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Õige või vale?';
$label = 'Kehalise kasvatuse tunnis joostakse, ujutakse, hüpatakse, painutatakse, kirjutatakse, süüakse ja võimeldakse.';

create_lugmot_form($wcode, $page, $maxp, $title, $label);