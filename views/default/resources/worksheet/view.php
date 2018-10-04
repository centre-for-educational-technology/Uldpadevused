<?php

//hetkel väga lihtne kood lihtsalt et näha et asi toimib

$wcode = elgg_extract('wcode', $vars);

$sheets = elgg_get_entities(array(
  'metadata_names' => array('wcode'),
  'metadata_values' => array($wcode)
));

echo print_r(sizeof($sheets), true);

echo '<br>';

if (count($sheets) == 0) return;

$sheet = $sheets[0];

echo $sheet->wcode;