<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');
$maxp = get_input('maxp');

//check if time is up
$timeup = is_time_up($wcode);
if ($timeup)
{
  form_text_save($wcode);
  system_message(ee_echo('polls:success:timeup'));
  forward_home();
}

$value = get_input('q');
$_SESSION[$wcode.'p'.$page] = $value;

//check if its last page
if ($page == $maxp)
{
  form_text_save($wcode);
  system_message(ee_echo('polls:success:received'));
  forward_home();
}

//go to the next question
forward_next_url($wcode, $page);

function form_text_save($wcode) {
  //retrieve data from session and write it to a new line.
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'",';
  for ($i = 1; $i <= 9; $i += 1)
  {
    $value = $_SESSION[$wcode.'p'.$i];
    $csvline .= '"'.$value.'"';
    if ($i < 9) $csvline .= ',';
  }
  $csvline .= "\n";

  //add made csv line to sheet csv
  add_csv_to_sheet($wcode, $csvline);
}