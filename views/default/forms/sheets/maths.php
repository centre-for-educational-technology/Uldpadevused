<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp, $poll);

$title = 'Lahenda ülesanded. Vastused kirjuta numbritega. Kasuta paberit arvutamiseks ja jooniste tegemiseks.';
$all = [
    '1. Ants elab koolist 3 km kaugusel. Mart elab 4 korda kaugemal kui Ants. Kui kaugel koolist elab Mart?',
    '2. Kadril ja Lauril on kokku 24 arvutimängu. Kadril on 6 arvutimängu rohkem kui Lauril. Mitu arvutimängu on Lauril?',
    '3. Klassis oli 12 õpilast. Vahetunnis läks viis õpilast klassist välja ja kaks õpilast tuli klassi. Mitu õpilast on nüüd klassis?',
    '4. Pillel on 56 mänguklotsi. Tal on 8 korda rohkem klotse kui Ainol. Mitu klotsi on Ainol?'
];

echo elgg_view_title($title);

$regex = '[0-9]+';

for ($i = 0; $i < 4; $i += 1)
{
    $ipp = $i + 1;
    echo elgg_view_field([
        '#label' => $all[$i],
        'name' => 'q'.$ipp,
        'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q'.$ipp],
        '#type' => 'text',
        'required' => true,
        'pattern' => $regex
    ]);
}

form_view_buttons($wcode, $page, $maxp, $poll);