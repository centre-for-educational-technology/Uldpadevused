<?php

$wcode = get_input('wcode');
$sheets = elgg_get_entities(array(
  'metadata_names' => array('wcode'),
  'metadata_values' => array($wcode)
));
$sheet = $sheets[0];

//increase number of replies by 1
$replies = $sheet->replies;
$replies = strval(intval($replies) + 1);
$sheet->replies = $replies;
$sheet->save();