<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');

//save data
for ($i = 1; $i < 7; $i += 1)
{
  $value = get_input('q'.$i);
  $_SESSION[$wcode.'p'.$page.'q'.$i] = $value;
}

//save
form_lumela_save($wcode);

//go to home page
system_message("Sinu vastused on edukalt salvestatud!");
forward_home();