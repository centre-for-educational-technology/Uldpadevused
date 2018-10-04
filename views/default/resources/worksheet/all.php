<?php
$titlebar = "Üldpädevused";
$pagetitle = "Üldpädevused";

$sheets = elgg_get_entities(array(
  'type' => 'object',
  'subtype' => 'worksheet',
));

$body = '<table style="width:100%;"><tr>';
$body .= "<th>#</th>";
$body .= "<th>Kood</th>";
$body .= "<th>Kuupäev</th>";
$body .= "<th>Vastanute arv</th>";
$body .= "<th>Küsimustiku nimi</th>";
$body .= "<th>Staatus</th>";
$body .= "<th>Lae alla</th>";
$body .= "</tr>";
$n = count($sheets);
for ($i = 0; $i < $n; $i += 1)
{
  $sheet = $sheets[$i];

  $body .= "<tr>";

  $body .= "<th>".strval($i + 1)."</th>";
  $body .= "<th>".$sheet->wcode."</th>";
  $body .= "<th>".$sheet->wdate."</th>";
  $body .= "<th>"."gnome"."</th>";
  $body .= "<th>".$sheet->title."</th>";
  $body .= "<th>".$sheet->state."</th>";
  $body .= "<th>"."gnome"."</th>";

  $body .= "</tr>";
}
$body .= "</table>";

$body = elgg_view_title($pagetitle) . elgg_view_layout('one_column', array('content' => $body));

echo elgg_view_page($titlebar, $body);