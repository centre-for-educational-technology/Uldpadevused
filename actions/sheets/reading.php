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