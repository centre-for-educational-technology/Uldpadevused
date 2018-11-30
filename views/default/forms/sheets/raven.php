<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp, $poll);

$ltr = "abcdefgh";
$url = elgg_get_site_url();

echo '<img src="'.$url.'mod/Uldpadevused/images/raven'.$page.'.png" width=600px>';

for ($i = 0; $i < 8; $i += 1)
{
    $name = '<img src="'.$url.
    'mod/Uldpadevused/images/raven'.
    $page.$ltr[$i].'.png" width=150px>';

    if ($i == 3) $name .= '<br>';
    
    $options[$name] = $i + 1;
    
}

//technically this is not the correct way of doing css in elgg
echo '<style>
  input[type="radio"]{
    opacity:0;
    position:fixed;
  }
  input[type="radio"]:checked+img{
    -filter:sepia(100%) saturate(4000%) grayscale(80%) hue-rotate(300deg);
    -webkit-filter:sepia(100%) saturate(4000%) grayscale(80%) hue-rotate(300deg);
  }
</style>';

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