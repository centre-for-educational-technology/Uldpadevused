<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');

//save data to session
$value = get_input('q');
$_SESSION[$wcode.'p'.$page] = $value;

//check if time is up
$timeup = is_time_up($wcode);
if ($timeup)
{
  form_lugmot_save($wcode);
  system_message("Aeg sai läbi! Sinu vastused on salvestatud.");
  forward_home();
}

//go to the next question
forward_next_url($wcode, $page);