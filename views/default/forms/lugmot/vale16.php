<?php
//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Õige või vale?';
$label = 'Talvel, kui lumi on maas, saab kelgutada ja suusatada.';

create_lugmot_form($wcode, $page, $maxp, $title, $label);