<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp);

$all = [
  1 => [
    'labels' => [
      'Ma loen hästi.',
      'Lugeda on tore.',
      'Hea lugemisoskus aitab mul paremini õppida.'
    ]
  ],
  2 => [
    'labels' => [
      'Ma olen hea lugeja.',
      'Mulle meeldib koolis lugeda.',
      'Hea lugemisoskus aitab mul uusi teadmisi saada.'
    ]
  ],
  3 => [
    'labels' => [
      'Lugemine on minu jaoks raske.',
      'Mulle meeldib kodus lugeda.',
      'Hea lugemisoskus aitab mul elus paremini toime tulla.'
    ]
  ],
];

form_view_3emoticons($all[$page]['labels'], $wcode, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);