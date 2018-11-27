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
    1 => 'Kadri veeretas kolme täringut ja sai 13 silma. Ühe täringuga sai ta 4 silma. Mitu silma sai ta kahe teise täringuga?',
    2 => 'Kadril ja lauril on kokku 24 arvutimängu. Kadril on 6 arvutimängu rohkem kui Lauril. Mitu arvutimängu on Lauril?',
    3 => 'Klassis oli 12 õpilast. Vahetunnis läks viis õpilast klassist välja ja kaks õpilast tuli klassi. Mitu õpilast on nüüd klassis?',
    4 => 'Kadril on kodus 31 raamatut. 8 raamatut on ingliskeelsed, 13 raamatut on venekeelsed, ülejäänud eestikeelsed. Mitu eestikeelset raamatut on Kadril?'
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