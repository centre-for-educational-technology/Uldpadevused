<?php
session_start();

$wcode = get_input('wcode');

//save data to session just in case we cant save rn
for ($i = 1; $i < 7; $i += 1)
{
  $value = get_input('q'.$i);
  $_SESSION[$wcode.'p7q'.$i] = $value;
}

//retrieve data from session and write it to a new line.
$csvline = '"'.$_SESSION[$wcode.'name'].'","'.$_SESSION[$wcode.'grade'].'",';
for ($i = 1; $i <= 7; $i += 1)
{
  $part = $wcode.'p'.$i.'q';
  for ($k = 1; $k <= 6; $k += 1)
  {
    $value = $_SESSION[$part.$k];
    if (!$value)
    {
      register_error($i.'.'.$k.' on vastamata!');
      forward(REFERER);
    }
    $csvline .= '"'.$value.'"';
    if ($k < 6) $csvline .= ',';
  }
  if ($i < 7) $csvline .= ',';
}
$csvline .= "\n";

//add made csv line to sheet csv
$sheet = get_sheet_from_wcode($wcode);
$csv = $sheet->csv;
$csv .= $csvline;
$sheet->csv = $csv;

//increase sheet replies
$replies = $sheet->replies;
$replies = strval(intval($replies) + 1);
$sheet->replies = $replies;

$sheet->save();

//go to home page
system_message("Sinu vastused on edukalt salvestatud!");
forward_home();