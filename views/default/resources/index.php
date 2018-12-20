<head>
  <?php echo_css('index.css'); ?>
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

<div id="content">
  <div id="image">
    <?php echo_img('statue.jpg'); ?>
  </div>
  <div id="link">
    <?php echo_url('uldpadevused:begin', 'polls:main:start'); ?>
  </div>
</div>

<?php
function echo_url($elgg_url, $elgg_caption)
{
  $href = elgg_generate_url($elgg_url);
  echo '<a href="'.$href.'">'.ee_echo($elgg_caption).'</a>';
}
function echo_img($filename)
{
  echo '<img src="'.elgg_get_site_url().'/mod/Uldpadevused/images/'.$filename.'">';
}
function echo_css($filename)
{
  echo '<link rel="stylesheet" href="'.elgg_get_simplecache_url('css/'.$filename).'">';
}



return;
//old code below here just for reference

elgg_load_css('hidebar');
elgg_load_css('general');
elgg_load_Css('index');

$title = ee_echo('polls:main:title');
$content = elgg_view_title($title);

$href1 = elgg_generate_url('uldpadevused:begin');
$href2 = elgg_generate_url('uldpadevused:teacher');

//start answering to a poll
$content .= '<a href="'.$href1.'" class="elgg-button elgg-button-action">'.ee_echo('polls:main:start').'</a>';
$content .= '<a href="'.$href2.'">'.ee_echo('polls:main:teacher').'</a>';

$body = elgg_view_layout('no_sidebar', array(
   'content' => $content
));

echo elgg_view_page($title, $body);