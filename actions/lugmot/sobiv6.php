<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');

//save data to session
$value = get_input('q'.'1');
$_SESSION[$wcode.'p6q'.'1'] = $value;

//go to the next question
forward_next_url($wcode, $page); 