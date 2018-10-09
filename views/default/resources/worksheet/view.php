<?php

//hetkel väga lihtne kood lihtsalt et näha et asi toimib

//find the right worksheet
$wcode = elgg_extract('wcode', $vars);

$sheet = get_sheet_from_wcode($wcode);

if (!$sheet || $sheet->state != 'Alanud')
{
  register_error("Sellise koodiga avatud küsistlust ei leitud.");
  forward(REFERER);
}

$title = "Küsimustikud - Üldpädevused";
$content = elgg_view_title($title);

//show the correct worksheet form
$stype = $sheet->title;
if ($stype == worksheet1)
{
  $form = "sheets/worksheet1";
}
else if ($stype == worksheet2)
{
  $form = "sheets/worksheet2";
}
else if ($stype == worksheet3)
{
  $form = "sheets/worksheet3";
}
$content .= elgg_view_form($form, array(), array('wcode' => $sheet->wcode));

$body = elgg_view_layout('no_sidebar', array(
  'content' => $content
));
echo elgg_view_page($title, $body);