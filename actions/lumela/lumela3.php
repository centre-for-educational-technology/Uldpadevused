<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');

//save data to session
for ($i = 1; $i < 7; $i += 1)
{
  $value = get_input('q'.$i);
  $_SESSION[$wcode.'p3q'.$i] = $value;
}

//check if time is up
$timeup = is_time_up($wcode);
if ($timeup)
{
  form_lumela_save($wcode);
  system_message("Aeg sai läbi! Sinu vastused on salvestatud.");
  forward_home();
}

//go to the next question
forward_next_url($wcode, $page);