<?php
elgg_ajax_gatekeeper();
session_start();

//get data
$wcode = get_input('wcode');
$page = get_input('page');
$id = get_input('id');
$value = get_input('value');

//check time limit. if time is up, data isn't saved
$timeup = is_time_up($wcode);
if ($timeup)
{
  return;
}

//save to session
$_SESSION[$wcode.'p'.$page.'q'.$id] = $value;