<?php
$wcode = get_input('wcode');

$tallinn = timezone_open('Europe/Tallinn');
$now = date_create("now", $tallinn);
$unix = date_timestamp_get($now);
$_SESSION[$wcode.'start'] = $unix;

$_SESSION[$wcode.'name'] = get_input('name');
$_SESSION[$wcode.'gender'] = get_input('gender');
$_SESSION[$wcode.'age'] = get_input('age');

$sheet = get_sheet_from_wcode($wcode);
if (!$sheet)
{
  register_error("Sellise koodiga küsistlust ei leitud.");
  forward(REFERER);
}
else if ($sheet->state != 'Alanud')
{
  register_error("See küsitlus pole veel alanud!");
  forward(REFERER);
}

$url = elgg_generate_url('view:object:worksheet', [
  'wcode' => $wcode,
  'page' => 1
]);
forward($url);