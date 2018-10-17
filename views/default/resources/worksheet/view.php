<?php
$wcode = elgg_extract('wcode', $vars);

//find the right worksheet object
$sheet = get_sheet_from_wcode($wcode);
if (!$sheet)
{
  register_error("Sellise koodiga küsistlust ei leitud.");
  forward(REFERER);
}

//find correct page of form
$stype = $sheet->title;
$key = array_search($stype, array_column(worksheets, 'name'));
$page = elgg_extract('page', $vars);
$maxp = count(worksheets[$key]['pages']);
if (!$page || $page < 1)
{
  $page = 1;
}
else if ($page > $maxp)
{
  $page = $maxp;
}
$form = worksheets[$key]['folder'].'/'.worksheets[$key]['pages'][$page];

//display form
$content = elgg_view_title($stype);
$content .= elgg_view_form($form, array(), array('wcode' => $wcode, 'page' => $page, 'maxp' => $maxp));

$body = elgg_view_layout('no_sidebar', array(
  'content' => $content
));
echo elgg_view_page($title, $body);