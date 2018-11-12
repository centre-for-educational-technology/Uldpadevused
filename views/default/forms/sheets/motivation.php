<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp, $poll);

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

$labels = $all[$page]['labels'];
for ($i = 0; $i < 3; $i = $ipp)
  {
    $ipp = $i + 1;
    echo elgg_view_field([
      '#label' => $labels[$i],
      'name' => 'q'.$ipp,
      'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q'.$ipp],
      'options' => [
        'Ei ole üldse nõus' => 1,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        'Olen täiesti nõus' => 5
      ],
      '#type' => 'radio',
      'align' => 'horizontal',
      'required' => true
    ]);
  }

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp, $poll);