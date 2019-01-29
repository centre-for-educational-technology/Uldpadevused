<head>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>

<?php

gatekeeper();

$title = ee_echo('polls:all:title');

$sheets = elgg_get_entities(array(
  'type' => 'object',
  'subtype' => 'worksheet',
  'limit' => 0
));

$body = "";

if (elgg_is_admin_logged_in())
{
  $body .= elgg_view_form('worksheet/delete');
}

$body .= '<table style="width:100%;"><tr>';
$body .= "<th>#</th>";
$body .= "<th>".ee_echo('polls:all:code')."</th>";
$body .= "<th>".ee_echo('polls:all:date')."</th>";
$body .= "<th>".ee_echo('polls:all:replycount')."</th>";
$body .= "<th>".ee_echo('polls:all:author')."</th>";
$body .= "<th>".ee_echo('polls:all:pollname')."</th>";
$body .= "<th>".ee_echo('polls:all:status')."</th>";
$body .= "<th>".ee_echo('polls:all:download')."</th>";
$body .= "</tr>";
$n = count($sheets);
for ($i = 0; $i < $n; $i += 1)
{
  $sheet = $sheets[$i];

  $body .= "<tr>";

  $body .= "<th>".strval($i + 1)."</th>";
  $body .= "<th>".$sheet->wcode."</th>";
  $body .= "<th>".$sheet->wdate."</th>";
  $body .= "<th>".$sheet->replies."</th>";
  $body .= "<th>".$sheet->author."</th>";
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

$body = elgg_view_title($title) . elgg_view_layout('one_column', array('content' => $body));

echo elgg_view_page($title, $body);