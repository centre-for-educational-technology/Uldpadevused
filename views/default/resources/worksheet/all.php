<?php

gatekeeper();

$titlebar = "Üldpädevused";
$pagetitle = "Üldpädevused";

$sheets = elgg_get_entities(array(
  'type' => 'object',
  'subtype' => 'worksheet',
  'limit' => 0
));

$body = '<table style="width:100%;"><tr>';
$body .= "<th>#</th>";
$body .= "<th>Kood</th>";
$body .= "<th>Kuupäev</th>";

//for testing purposes
$body .= "<th>Kell</th>";
$body .= "<th>Lõpp</th>";

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

  //for testing purposes
  $body .= "<th>".$sheet->wtime."</th>";
  $body .= "<th>".$sheet->wtend."</th>";

  $body .= "<th>".$sheet->replies."</th>";
  $body .= "<th>".$sheet->title."</th>";
  $body .= "<th>".$sheet->state."</th>";

  $url = elgg_generate_url(
    'download:object:worksheet',
    array('wcode' => $sheet->wcode)
  );
  $download = '<a href="'.$url.'">.csv</a>';
  $body .= "<th>".$download."</th>";

  $body .= "</tr>";
}
$body .= "</table>";

$body = elgg_view_title($pagetitle) . elgg_view_layout('one_column', array('content' => $body));

echo elgg_view_page($titlebar, $body);