<?php
elgg_load_css('hidebar');

$title = ee_echo('polls:main:title');;
$content = elgg_view_title($title);
$content .= elgg_view_form("begin");

$body = elgg_view_layout('no_sidebar', array(
   'content' => $content
));

echo elgg_view_page($title, $body);