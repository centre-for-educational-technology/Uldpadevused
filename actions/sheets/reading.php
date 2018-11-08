<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');
$maxp = get_input('maxp');

//check if time is up
$timeup = is_time_up($wcode);
if ($timeup)
{
  form_reading_save($wcode);
  system_message(ee_echo('polls:success:timeup'));
  forward_home();
}

//save data to session
$value = get_input('q');
$_SESSION[$wcode.'p'.$page] = $value;

if ($page == $maxp)
{
  form_reading_save($wcode);
  system_message(ee_echo('polls:success:received'));
  forward_home();
}

//go to the next question
forward_next_url($wcode, $page);

function form_reading_save($wcode) {
  //retrieve data from session and write it to a new line.
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'",';
  for ($i = 1; $i <= 36; $i += 1)
  {
    $value = $_SESSION[$wcode.'p'.$i];
    $csvline .= '"'.$value.'"';
    if ($i < 36) $csvline .= ',';
  }
  $csvline .= "\n";

  //add made csv line to sheet csv
  add_csv_to_sheet($wcode, $csvline);
}