<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');

//save data to session
for ($i = 1; $i <= 6; $i++)
{
  $value = get_input('q'.$i);
  $_SESSION[$wcode.'p'.$page.'q'.$i] = $value;
}

//save
form_upased_save($wcode);
system_message("Sinu vastused on edukalt salvestatud!");
forward_home();