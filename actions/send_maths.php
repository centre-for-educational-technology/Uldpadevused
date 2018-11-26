<?php
elgg_ajax_gatekeeper();
session_start();

//get data
$img = get_input('img');
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
  $drawing->access_id = 'logged_in';
  $drawing->icode = $icode;
  system_message("made new one");
}

$drawing->img = $img;

$drawing->save();

$url = elgg_generate_url('view:object:drawing', [
  'icode' => $icode
]);

//return url
echo json_encode([
  'imgUrl' => $url
]);

return true;