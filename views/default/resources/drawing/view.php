<?php

gatekeeper();

$icode = elgg_extract('icode', $vars);

//find the right worksheet object
$drawing = get_img_from_icode($icode);
if (!$drawing)
{
  register_error(ee_echo("pole pilti"));
  forward(REFERER);
}
$img = $drawing->img;

//display form
$title = "mingi pilt";

$content = elgg_view_title($title);

$content .= '<img src="'.$img.'">';

$body = elgg_view_layout('no_sidebar', array(
  'content' => $content
));
echo elgg_view_page($title, $body);