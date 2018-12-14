<?php
session_start();
elgg_require_js('uldpadevused/motivation');

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
      'Lugemine on minu jaoks kerge.',
      'Mulle meeldib kodus lugeda.',
      'Hea lugemisoskus aitab mul elus paremini toime tulla.'
    ]
  ],
];

//technically this is not the correct way of doing css in elgg
echo '<style>
  input[type="radio"]{
    opacity:0;
    position:fixed;
  }
  input[type="radio"]:not(:checked)+img{
    -filter:grayscale(80%) hue-rotate(340deg);
    -webkit-filter:grayscale(80%) hue-rotate(340deg);
  }
</style>';

$labels = $all[$page]['labels'];
for ($i = 0; $i < 3; $i = $ipp)
  {
    $ipp = $i + 1;
    echo elgg_view_field([
      '#label' => $labels[$i],
      'name' => 'q'.$ipp,
      'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q'.$ipp],
      'options' => [
        '<img src="'.elgg_get_site_url().'mod/Uldpadevused/images/sadder.png">' => 1,
        '<img src="'.elgg_get_site_url().'mod/Uldpadevused/images/sad.png">' => 2,
        '<img src="'.elgg_get_site_url().'mod/Uldpadevused/images/poker.png">' => 3,
        '<img src="'.elgg_get_site_url().'mod/Uldpadevused/images/happy.png">' => 4,
        '<img src="'.elgg_get_site_url().'mod/Uldpadevused/images/happier.png">' => 5
      ],
      '#type' => 'radio',
      'align' => 'horizontal',
      'required' => true,
      'oninvalid' => "this.setCustomValidity('Vali üks neist valikutest!');"
    ]);
  }

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp, $poll);