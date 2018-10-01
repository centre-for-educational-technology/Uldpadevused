<?php

//hetkel väga lihtne kood lihtsalt et näha et asi toimib

$wcode = elgg_extract('wcode', $vars);

$sheets = elgg_get_entities(array(
  'wcode' => $wcode
));

if (count($sheets) == 0) return;

$sheet = $sheets[0];

echo $sheet->wcode;