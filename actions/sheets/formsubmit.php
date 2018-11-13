<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');
$poll = get_input('poll');

//get more data
$stype = get_poll_id($wcode, $poll);
$maxp = count(worksheets[$stype]['pages']);

//check if time is up
if (is_time_up($wcode, $poll))
{
  system_message(ee_echo('polls:success:timeup'));
  forward_next_poll($wcode, $poll);
}

//get question count for current page
$qcount = worksheets[$stype]['pages'][$page];

//save page data to session
for ($i = 1; $i <= $qcount; $i += 1)
{
  $value = get_input('q'.$i);
  $_SESSION[$wcode.'p'.$poll.'p'.$page.'q'.$i] = $value;
}

//check if it was the last page
if ($page == $maxp)
{
  forward_next_poll($wcode, $poll);
}

//go to the next page
forward_next_page($wcode, $page, $poll);

function save_form($wcode)
{
  //get data from session and write it to new csv line
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'"';

  $n = get_poll_count($wcode);

  for ($s = 1; $s <= $n; $s += 1)
  {
    $stype = get_poll_id($wcode, $s);

    //get page count
    $pcount = count(worksheets[$stype]['pages']);

    $part1 = $wcode.'p'.$s.'p';
  
    for ($i = 1; $i <= $pcount; $i += 1)
    {
      //get question count
      $qcount = worksheets[$stype]['pages'][$i];

      $part2 = $part1.$i.'q';

      for ($k = 1; $k <= $qcount; $k += 1)
      {
        $csvline .= ',"'.$_SESSION[$part2.$k].'"';
      }
    }
  }
  $csvline .= "\n";
  
  //write csv line to worksheet
  $sheet = get_sheet_from_wcode($wcode);
  $csv = $sheet->csv;
  $csv .= $csvline;
  $sheet->csv = $csv;

  //increase sheet replies
  $replies = $sheet->replies;
  $replies = strval(intval($replies) + 1);
  $sheet->replies = $replies;

  //save sheet
  $sheet->save();
}

//forwards to next page of given worksheet
function forward_next_page($wcode, $page, $poll)
{
  $url = elgg_generate_url('view:object:worksheet', [
    'wcode' => $wcode,
    'page' => $page + 1,
    'poll' => $poll
  ]);
  forward($url);
}

function forward_next_poll($wcode, $poll)
{
  $n = $poll + 1;

  if ($n > get_poll_count($wcode))
  {
    save_form($wcode);
    system_message(ee_echo('polls:success:received'));
    forward_home();
  }

  system_message(ee_echo('polls:success:newform'));
  $url = elgg_generate_url('view:object:worksheet', [
    'wcode' => $wcode,
    'poll' => $poll + 1,
    'page' => 1
  ]);
  forward($url);
}

//forwards home
function forward_home()
{
  $url = elgg_generate_url('index');
  forward($url);
}

function is_time_up($wcode, $poll)
{
  $id = get_poll_id($wcode, $poll);
  $limit = worksheets[$id]['timelimit'];
  //check if the time is up
  $start = $_SESSION[$wcode.'start'.$poll];
  $tallinn = timezone_open('Europe/Tallinn');
  $now = date_create("now", $tallinn);
  $unix = date_timestamp_get($now);

  return $unix - $start >= $limit;
}