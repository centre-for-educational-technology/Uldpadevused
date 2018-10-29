<?php

$title = ee_echo('polls:main:title');
$content = elgg_view_title($title);

$href1 = elgg_generate_url('uldpadevused:begin');

//start answering to a poll
$content .= '<a href="'.$href1.'" class="elgg-button elgg-button-action">'.ee_echo('polls:main:start').'</a>';

if (elgg_is_logged_in())
{
  $href2 = elgg_generate_url('add:object:worksheet');
  $content .= '<a href="'.$href2.'" class="elgg-button elgg-button-action">'.ee_echo('polls:add:title').'</a>';

  $href3 = elgg_generate_url('collection:object:worksheet:all');
  $content .= '<a href="'.$href3.'" class="elgg-button elgg-button-action">'.ee_echo('polls:all:title').'</a>';
}

$body = elgg_view_layout('no_sidebar', array(
   'content' => $content
));

echo elgg_view_page($title, $body);