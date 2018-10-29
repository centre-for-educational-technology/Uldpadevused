<?php
$wcode = elgg_extract('wcode', $vars);

//find the right worksheet object
$sheet = get_sheet_from_wcode($wcode);
if (!$sheet)
{
  register_error(ee_echo('polls:error:notfound'));
  forward(REFERER);
}

$time = $_SESSION[$wcode.'start'];
if (!$time)
{
  register_error(ee_echo('polls:error:wrongstart'));
  forward(elgg_generate_url('uldpadevused:begin'));
}

//find correct page of form
$stype = $sheet->title;
$key = array_search($stype, array_column(worksheets, 'name'));
$page = elgg_extract('page', $vars);
$maxp = worksheets[$key]['pages'];
if (!$page || $page < 1)
{
  $page = 1;
}
else if ($page > $maxp)
{
  $page = $maxp;
}
$form = worksheets[$key]['file'];

//display form
$content = elgg_view_title($stype);
$content .= elgg_view_form($form, array(), array('wcode' => $wcode, 'page' => $page, 'maxp' => $maxp));

$body = elgg_view_layout('no_sidebar', array(
  'content' => $content
));
echo elgg_view_page($title, $body);