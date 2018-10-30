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
  form_upased_save($wcode);
  system_message("Aeg sai läbi! Sinu vastused on salvestatud.");
  forward_home();
}
else if ($page == $maxp)
{
  form_upased_save($wcode);
  system_message("Sinu vastused on edukalt salvestatud!");
  forward_home();
}

//go to the next question
forward_next_url($wcode, $page);