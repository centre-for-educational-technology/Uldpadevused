<head>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <?php echo_css('index.css'); ?>
  <?php echo_Css('general.css'); ?>
</head>

<?php
session_start();
elgg_load_css('hidebar');
elgg_load_css('general');
elgg_load_css('index');

$title = '';

$content =
'<div id="header">
  <div id="title">
    <h1>Üldpädevused</h1>
  </div><!--
    this is here to get rid of the whitespace between the two divs
  --><div id="teacher">
    <a href="'.elgg_generate_url('uldpadevused:teacher').'">'.
    ee_echo('polls:main:teacher').'</a>
  </div>
</div>

<div id="content">
  <div id="image">'.
    view_img("statue.jpg").'
  </div>
  <div id="link">
    <a href="'.elgg_generate_url('uldpadevused:begin').'">
      <div id="click">'.
        ee_echo('polls:main:start').'
      </div>
    </a>
  </div>
</div>';

echo elgg_view_page($title, $content);