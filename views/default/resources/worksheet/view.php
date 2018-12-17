<?php
elgg_load_css('hidebar');

$wcode = elgg_extract('wcode', $vars);
$poll = elgg_extract('poll', $vars);
$page = elgg_extract('page', $vars);

//find the right worksheet object
$sheet = get_sheet_from_wcode($wcode);
if (!$sheet)
{
  register_error(ee_echo('polls:error:notfound'));
  forward(REFERER);
}

//if start time hasn't been set for this poll then set it
$time = $_SESSION[$wcode.'start'.$poll];
if (!$time)
{
  $tallinn = timezone_open('Europe/Tallinn');
  $now = date_create("now", $tallinn);
  $unix = date_timestamp_get($now);
  $_SESSION[$wcode.'start'.$poll] = $unix;
}

//make sure we dont try to access a poll that doesnt exist
$pollcount = get_poll_count($wcode);
if (!$poll || $poll < 0)
{
  $poll = 1;
}
else if ($poll > $pollcount)
{
  $poll = $pollcount;
}

//find correct page of form
$stype = get_poll_id($wcode, $poll);

//make sure we dont try to access a page that doesnt exist
$maxp = count(worksheets[$stype]['pages']);
if (!$page || $page < 1)
{
  $page = 1;
}
else if ($page > $maxp)
{
  $page = $maxp;
}

$form = worksheets[$stype]['file'];

//display form
$title = worksheets[$stype]['name'];

$content = elgg_view_form($form, array(), array('wcode' => $wcode, 'page' => $page, 'maxp' => $maxp, 'poll' => $poll));

$body = elgg_view_layout('no_sidebar', array(
  'content' => $content
));
echo elgg_view_page($title, $body);