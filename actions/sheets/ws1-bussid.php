<?php

$wcode = get_input('wcode');
$page = get_input('page');

//save data to cookies
$bussid = get_input('bussid');
$cookie = new ElggCookie('ws1-01');
//$cookie->setExpireDate();//set to sheet end
$cookie->value = $bussid;
elgg_set_cookie($cookie);
//setcookie('ws1-bussid[01]', $bussid, $expire);

//go to the next question
$url = elgg_generate_url('view:object:worksheet', [
  'wcode' => $wcode,
  'page' => $page + 1
]);
forward($url);