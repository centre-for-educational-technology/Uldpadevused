<?php

//hetkel väga lihtne kood lihtsalt et näha et asi toimib

//find the right worksheet
$wcode = elgg_extract('wcode', $vars);
$sheets = elgg_get_entities(array(
  'metadata_names' => array('wcode'),
  'metadata_values' => array($wcode),
));
if (count($sheets) == 0 || $sheets[0]->state != 'Alanud')
{
  register_error("Sellise koodiga avatud küsistlust ei leitud.");
  forward(REFERER);
}
$sheet = $sheets[0];

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