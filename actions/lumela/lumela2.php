<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');

//save data to session
for ($i = 1; $i < 7; $i += 1)
{
  $value = get_input('q'.$i);
  $_SESSION['w1p2q'.$i] = $value;
}

//go to the next question
forward_next_url($wcode, $page);