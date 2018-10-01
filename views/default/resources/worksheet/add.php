<?php

gatekeeper();

$title = "Alusta uus küsimustik";
$content = elgg_view_title($title);

$content .= elgg_view_form("worksheet/save");

$sidebar = "";
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

echo elgg_view_page($title, $body);