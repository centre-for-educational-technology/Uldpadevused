<?php
session_start();
elgg_require_js('uldpadevused/maths');

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp, $poll);

$title = 'Lahenda ülesanne. Vastus kirjuta numbritega. Kasuta joonistuspinda arvutamiseks ja jooniste tegemiseks.';
$all = [
    1 => '1. Ants elab koolist 3 km kaugusel. Mart elab 4 korda kaugemal kui Ants. Kui kaugel koolist elab Mart?',
    2 => '2. Kadril ja Lauril on kokku 24 arvutimängu. Kadril on 6 arvutimängu rohkem kui Lauril. Mitu arvutimängu on Lauril?',
    3 => '3. Klassis oli 12 õpilast. Vahetunnis läks viis õpilast klassist välja ja kaks õpilast tuli klassi. Mitu õpilast on nüüd klassis?',
    4 => '4. Pillel on 56 mänguklotsi. Tal on 8 korda rohkem klotse kui Ainol. Mitu klotsi on Ainol?'
];

echo elgg_view_title($title);

$regex = '[0-9]+';

echo elgg_view_field([
    '#label' => $all[$page],
    'name' => 'q1',
    'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q1'],
    '#type' => 'text',
    'required' => true,
    'pattern' => $regex
]);
echo elgg_view_field([
    '#type' => 'hidden',
    'name' => 'q2',
    'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q2']
]);

$imgid = 'img'.$wcode.$page;
echo '<div id="'.$imgid.'" style="width:600px;height:400px"></div>';

form_view_buttons($wcode, $page, $maxp, $poll);

function maths_view_buttons($wcode, $page, $maxp, $poll)
{
  if ($page > 1)
  {
    $href1 = elgg_generate_url('view:object:worksheet', [
      'wcode' => $wcode,
      'page' => $page - 1,
      'poll' => $poll
    ]);
    echo '<a href="'.$href1.'" class="elgg-button elgg-button-action" style="display:inline-block; float:left">'.ee_echo('polls:buttons:previous').'</a>';
  }

  $value = $page < $maxp 
    ? ee_echo('polls:buttons:next') 
    : ($poll < get_poll_count($wcode)
      ? ee_echo('polls:button:nextpoll')
      : ee_echo('polls:buttons:submit'));
  echo '<a href="" id="fakesubmit" class="elgg-button elgg-button-action" style="display:inline-block; float:left">'.$value.'</a>';

  echo '<button type="submit" style="width:0;height:0;margin:0;padding:0"></button>';
}