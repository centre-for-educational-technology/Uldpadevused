<?php

$title = "Küsimustikud - Üldpädevused";
$content = elgg_view_title($title);

$href1 = elgg_generate_url('begin');
$href2 = elgg_generate_url('login');

$content .= '<a href="'.$href1.'" class="elgg-button elgg-button-action">Alusta küsimustiku täitmist</a>';

$body = elgg_view_layout('no_sidebar', array(
   'content' => $content
));

echo elgg_view_page($title, $body);