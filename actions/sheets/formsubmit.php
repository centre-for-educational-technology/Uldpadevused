<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');
$maxp = get_input('maxp');

//get worksheet object
$worksheet = get_sheet_from_wcode($wcode);
$stype = $worksheet->stype;

//get question count for current page
$qcount = worksheets[$stype]['pages'][$page];

//check if time is up
if (is_time_up($wcode))
{
  save_form($wcode, $stype);
  system_message(ee_echo('polls:success:timeup'));
  forward_home();
}

//save page data to session
for ($i = 1; $i <= $qcount; $i += 1)
{
  $value = get_input('q'.$i);
  $_SESSION[$wcode.'p'.$page.'q'.$i] = $value;
}

//check if it was the last page
if ($page == $maxp)
{
  save_form($wcode, $stype);
  system_message(ee_echo('polls:success:received'));
  forward_home();
}

//go to the next page
forward_next_url($wcode, $page);

function save_form($wcode, $stype)
{
  //get data from session and write it to new csv line
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'"';

  //get page count
  $pcount = count(worksheets[$stype]['pages']);

  for ($i = 1; $i <= $pcount; $i += 1)
  {
    //get question count
    $qcount = worksheets[$stype]['pages'][$i];

    $part = $wcode.'p'.$i.'q';
    for ($k = 1; $k <= $qcount; $k += 1)
    {
      $csvline .= ',"'.$_SESSION[$part.$k].'"';
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
function forward_next_url($wcode, $page)
{
  $url = elgg_generate_url('view:object:worksheet', [
    'wcode' => $wcode,
    'page' => $page + 1
  ]);
  forward($url);
}

//forwards home
function forward_home()
{
  $url = elgg_generate_url('index');
  forward($url);
}

function is_time_up($wcode) {
  $sheet = get_sheet_from_wcode($wcode);
  $limit = $sheet->limit;
  //check if the time is up
  $start = $_SESSION[$wcode.'start'];
  $tallinn = timezone_open('Europe/Tallinn');
  $now = date_create("now", $tallinn);
  $unix = date_timestamp_get($now);

  return $unix - $start >= $limit;
}