<head>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>

<div id="header">
  <div id="title">
    <h1>Üldpädevused</h1>
  </div><!--
    this is here to get rid of the whitespace between the two divs
  --><div id="teacher">
    <?php echo_url('uldpadevused:teacher', 'polls:main:teacher'); ?>
  </div>
</div>

<?php
elgg_load_css('hidebar');
elgg_load_css('general');
elgg_load_css('begin');
$title = ee_echo('polls:main:title');
$content = '<div id="image">'.view_img('statue.jpg').'</div>';
$content .= elgg_view_form("begin");
echo elgg_view_page($title, $content);

/*elgg_load_css('hidebar');
elgg_load_css('general');
elgg_load_css('begin');

$title = ee_echo('polls:main:title');;
$content = elgg_view_title($title);
$content .= elgg_view_form("begin");

$body = elgg_view_layout('no_sidebar', array(
   'content' => $content
));

echo elgg_view_page($title, $body);*/