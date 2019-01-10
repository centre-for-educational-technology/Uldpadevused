<?php

$wcode = get_input('wcode');
$page = get_input('page');
$poll = get_input('poll');

//get more data
$stype = get_poll_id($wcode, $poll);
$maxp = count(worksheets[$stype]['pages']);

//get question count for current page
$qcount = worksheets[$stype]['pages'][$page];

//don't save data, it is handled by ajax already

//check if it was the last page
if ($page == $maxp)
{
  forward_next_poll($wcode, $poll);
}

//go to the next page
forward_next_page($wcode, $page, $poll);

function save_form($wcode)
{
  session_start();
  $sheet = get_sheet_from_wcode($wcode);
  $csvline .= '"'.
  $sheet->school.'","'.
  $sheet->grade.'","'.
  $_SESSION[$wcode.'name'].'","'.
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
  session_write_close();
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