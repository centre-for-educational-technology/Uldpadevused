<?php
session_start();
elgg_load_css('chain');

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp, $poll);

$c = $page > 2 ? 6 : 4;
$ltr = "abcdef";
$url = elgg_get_site_url();

echo '<img class="big-img" src="'.$url.'mod/Uldpadevused/images/kett'.$page.'.png"><br>';

echo "<p>Vali sobiv:</p>";

for ($i = 0; $i < $c; $i += 1)
{
    $options['<img class="small-img" src="'.$url.'mod/Uldpadevused/images/kett'.$page.$ltr[$i].'.png">'] = $i + 1;
}

echo elgg_view_field([
    'name' => 'q1',
    'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q1'],
    'options' => $options,
    '#type' => 'radio',
    'align' => 'horizontal',
    'required' => 'true'
]);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp, $poll);