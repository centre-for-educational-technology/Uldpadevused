<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');
$maxp = get_input('maxp');

//check if time is up
$timeup = is_time_up($wcode);
if ($timeup)
{
  form_metacognition_save($wcode);
  system_message(ee_echo('polls:success:timeup'));
  forward_home();
}

//save data to session
for ($i = 1; $i < 7; $i += 1)
{
  $value = get_input('q'.$i);
  $_SESSION[$wcode.'p'.$page.'q'.$i] = $value;
}

//check if its last page
if ($page == $maxp)
{
  form_metacognition_save($wcode);
  system_message(ee_echo('polls:success:received'));
  forward_home();
}

//go to the next question
forward_next_url($wcode, $page);

function form_metacognition_save($wcode) {
  //retrieve data from session and write it to a new line.
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'",';
  for ($i = 1; $i <= 7; $i += 1)
  {
    $part = $wcode.'p'.$i.'q';
    for ($k = 1; $k <= 6; $k += 1)
    {
      $value = $_SESSION[$part.$k];
      $csvline .= '"'.$value.'"';
      if ($k < 6) $csvline .= ',';
    }
    if ($i < 7) $csvline .= ',';
  }
  $csvline .= "\n";
  
  //add made csv line to sheet csv
  add_csv_to_sheet($wcode, $csvline);
}