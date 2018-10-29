<?php

$title = ee_echo('polls:main:title');
$content = elgg_view_title($title);

$href1 = elgg_generate_url('uldpadevused:begin');

$content .= '<a href="'.$href1.'" class="elgg-button elgg-button-action">'.
ee_echo('polls:main:start').'</a>';

$body = elgg_view_layout('no_sidebar', array(
   'content' => $content
));

echo elgg_view_page($title, $body);