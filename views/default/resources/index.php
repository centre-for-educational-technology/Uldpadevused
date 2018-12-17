<?php
elgg_load_css('hidebar');

$title = ee_echo('polls:main:title');
$content = elgg_view_title($title);

$href1 = elgg_generate_url('uldpadevused:begin');
$href2 = elgg_generate_url('uldpadevused:teacher');

//start answering to a poll
$content .= '<a href="'.$href1.'" class="elgg-button elgg-button-action">'.ee_echo('polls:main:start').'</a>';
$content .= '<a href="'.$href2.'" class="elgg-button elgg-button-action">'.ee_echo('polls:main:teacher').'</a>';

$body = elgg_view_layout('no_sidebar', array(
   'content' => $content
));

echo elgg_view_page($title, $body);