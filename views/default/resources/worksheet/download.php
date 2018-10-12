<?php

gatekeeper();

//find the right worksheet object's csv
$wcode = elgg_extract('wcode', $vars);
$sheet = get_sheet_from_wcode($wcode);
if (!$sheet)
{
  register_error("Sellist küsitlust ei leitud.");
  forward(REFERER);
}
$csv = $sheet->csv;

//send csv string to browser as file
$result = $csv;
$filename = 'kysitlus'.$wcode.'.csv';

header("Content-Type: text/plain");
header('Content-Disposition: attachment; filename="'.$filename.'"');
header("Content-Length: ".strlen($result));
echo $result;
exit;