<?php

gatekeeper();

$title = "Alusta uus küsimustik";
$content = elgg_view_title($title);
$content .= elgg_view_form("worksheet/save");

//display code if it is passed on
$wcode = elgg_extract('wcode', $vars);
if ($wcode)
{
  $content .= elgg_view_title('Sinu kood: '.$wcode);
}

$body = elgg_view_layout('no_sidebar', array(
   'content' => $content
));

echo elgg_view_page($title, $body);