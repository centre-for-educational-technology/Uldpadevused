<?php
elgg_ajax_gatekeeper();
session_start();

//get data
$img = get_input('img');
$q1 = get_input('q1');
$wcode = get_input('wcode');
$poll = get_input('poll');
$page = get_input('page');

//upload img to database and return url
$prefix = $wcode.'p'.$poll.'p'.$page;
$sessid = session_id();
$icode = $prefix . $sessid;

$drawing = get_img_from_icode($icode);

if (!$drawing)
{
  $drawing = new ElggObject();
  $drawing->subtype = 'drawing';
  $drawing->access_id = ACCESS_LOGGED_IN;
  $drawing->icode = $icode;
}

$drawing->img = $img;

$drawing->save();

$q2 = elgg_generate_url('view:object:drawing', [
  'icode' => $icode
]);

//save to session
$_SESSION[$wcode.'p'.$poll.'p'.$page.'q1'] = $q1;
$_SESSION[$wcode.'p'.$poll.'p'.$page.'q2'] = $q2;

return;