<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');

//save data to session
$_SESSION[$wcode.'name'] = get_input('name');
$_SESSION[$wcode.'grade'] = get_input('grade');

//go to the next question
forward_next_url($wcode, $page);