<?php
session_start();

$wcode = get_input('wcode');
$page = get_input('page');

//save data to session
$value = get_input('q');
$_SESSION[$wcode.'p'.$page] = $value;

//save
form_lugmot_save($wcode);
system_message("Sinu vastused on salvestatud.");
forward_home();