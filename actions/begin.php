<?php
$wcode = get_input('wcode');

$url = elgg_generate_url('view:object:worksheet', [
  'wcode' => $wcode,
  'page' => 1
]);
forward($url);