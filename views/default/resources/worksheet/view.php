<?php

//find the right worksheet object
$wcode = elgg_extract('wcode', $vars);
$sheet = get_sheet_from_wcode($wcode);
if (!$sheet || $sheet->state != 'Alanud')
{
  register_error("Sellise koodiga avatud küsistlust ei leitud.");
  forward(REFERER);
}

//find correct page of form
$stype = $sheet->title;
$key = array_search($stype, array_column(worksheets, 'name'));
$page = elgg_extract('page', $vars);
$maxp = count(worksheets[$key]['pages']) - 1;
if (!$page || $page < 0)
{
  $page = 0;
}
else if ($page > $maxp)
{
  $page = $maxp;
}
$form = worksheets[$key]['pages'][$page];

$content = elgg_view_title($stype);
$content .= elgg_view_form($form, array(), array('wcode' => $wcode, 'page' => $page, 'maxp' => $maxp));

$body = elgg_view_layout('no_sidebar', array(
  'content' => $content
));
echo elgg_view_page($title, $body);