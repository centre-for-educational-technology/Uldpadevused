<?php
session_start();
elgg_require_js('uldpadevused/maths');
elgg_load_css('maths');

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp, $poll);

$title = 'Lahenda ülesanne. Vastus kirjuta arvuga. Kasuta joonistuspinda arvutamiseks ja jooniste tegemiseks.';
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
    'pattern' => $regex,
    'maxlength' => '4',
    'autocomplete' => 'off'
]);

echo '<input type="checkbox" id="dontknow">Ma ei tea vastust</input>';

echo elgg_view_field([
    '#type' => 'hidden',
    'name' => 'q2',
    'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q2']
]);

$imgid = 'img'.$wcode.$page;
echo '<div class="drawer" id="'.$imgid.'" style="width:600px;height:400px"></div>';

form_view_buttons($wcode, $page, $maxp, $poll);