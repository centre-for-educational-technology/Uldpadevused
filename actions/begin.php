<?php
$wcode = get_input('wcode');

$_SESSION[$wcode.'name'] = get_input('name');
$_SESSION[$wcode.'gender'] = get_input('gender');
$_SESSION[$wcode.'age'] = get_input('age');

$sheet = get_sheet_from_wcode($wcode);
if (!$sheet)
{
  register_error(ee_echo('polls:error:notfound'));
  forward(REFERER);
}
else if ($sheet->state != 'Alanud')
{
  register_error(ee_echo('polls:error:notstarted'));
  forward(REFERER);
}

$url = elgg_generate_url('view:object:worksheet', [
  'wcode' => $wcode,
  'page' => 1,
  'poll' => 1
]);
forward($url);