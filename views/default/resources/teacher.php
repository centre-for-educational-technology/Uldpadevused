<?php

$title = ee_echo('polls:teacher:title');
$content = elgg_view_title($title);

if (elgg_is_logged_in())
{
  $href2 = elgg_generate_url('add:object:worksheet');
  $content .= '<a href="'.$href2.'" class="elgg-button elgg-button-action">'.ee_echo('polls:add:title').'</a>';

  $href3 = elgg_generate_url('collection:object:worksheet:all');
  $content .= '<a href="'.$href3.'" class="elgg-button elgg-button-action">'.ee_echo('polls:all:title').'</a>';
}
else
{
    $content .= ee_echo('polls:error:notloggedin').'<br>';
    $href4 = elgg_generate_url('index');
    $content .= '<a href="'.$href4.'" class="elgg-button elgg-button-action">'.ee_echo('polls:teacher:goback').'</a>';
}

$body = elgg_view_layout('no_sidebar', array(
   'content' => $content
));

echo elgg_view_page($title, $body);