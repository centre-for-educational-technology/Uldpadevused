<?php
//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Õige või vale?';
$label = 'Tõdruk, kellel on punased juuksed, tedretähnid, erinevatest paaridest sukad ja hiigelsuured kingad ning kes jaksab üles tõsta hobuse, on Pöial-Liisi.';

create_lugmot_form($wcode, $page, $maxp, $title, $label);