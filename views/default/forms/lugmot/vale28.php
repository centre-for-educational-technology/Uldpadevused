<?php
//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$title = 'Õige või vale?';
$label = 'Tuulise ja vihmase ilmaga tasub õue minnes võtta kaasa vihmavari, sest sellega saab igale poole lennata.';

create_lugmot_form($wcode, $page, $maxp, $title, $label);