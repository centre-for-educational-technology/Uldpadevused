<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');
$maxp = get_input('maxp');

//save data to session
for ($i = 1; $i < 7; $i += 1)
{
  $value = get_input('q'.$i);
  $_SESSION[$wcode.'p'.$page.'q'.$i] = $value;
}

//check if time is up or if its last page
$timeup = is_time_up($wcode);
if ($timeup)
{
  form_lumela_save($wcode);
  system_message(ee_echo('polls:success:timeup'));
  forward_home();
}
else if ($page == $maxp)
{
  form_lumela_save($wcode);
  system_message(ee_echo('polls:success:received'));
  forward_home();
}

//go to the next question
forward_next_url($wcode, $page);