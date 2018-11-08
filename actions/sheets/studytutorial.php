<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');
$maxp = get_input('maxp');

$n = $page == 1 ? 4 : 6;

//save data to session
for ($i = 1; $i <= $n; $i++)
{
  $value = get_input('q'.$i);
  $_SESSION[$wcode.'p'.$page.'q'.$i] = $value;
}

//check if time is up
$timeup = is_time_up($wcode);
if ($timeup)
{
  form_studytutorial_save($wcode);
  system_message(ee_echo('polls:success:timeup'));
  forward_home();
}
else if ($page == $maxp)
{
  form_studytutorial_save($wcode);
  system_message(ee_echo('polls:success:received'));
  forward_home();
}

//go to the next question
forward_next_url($wcode, $page);

function form_studytutorial_save($wcode) {
  //retrieve data from session and write it to a new line.
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'",';
  for ($i = 1; $i <= 4; $i += 1)
  {
    $value = $_SESSION[$wcode.'p1q'.$i];
    $csvline .= '"'.$value.'",';
  }
  for ($i = 1; $i <= 6; $i += 1)
  {
    $value = $_SESSION[$wcode.'p2q'.$i];
    $csvline .= '"'.$value.'"';
    if ($i < 6) $csvline .= ',';
  }
  $csvline .= "\n";

  //add made csv line to sheet csv
  add_csv_to_sheet($wcode, $csvline);
}