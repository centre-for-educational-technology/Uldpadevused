<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);

if ($page == 3)
{
  elgg_load_css('teeth');
}
else if ($page < 6)
{
  elgg_load_css('blockquestions');
  elgg_require_js('uldpadevused/blockquestions');
}
else
{
  elgg_load_css('eightquestions');
}

//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp, $poll);

$all = [
  1 => [
    1 => [
      'title' => 'Teksti sõna "tusane" tähendab',
      'labels' => [
        'tuisune' => 1,
        'pahur' => 2,
        'haige' => 3,
        'vaikne' => 4
      ],
    ],
    2 => [
      'title' => 'Fotol oli',
      'labels' => [
        'Priidu isa' => 1,
        'Priit' => 2,
        'Ameerika president' => 3,
        'Priidu klassi poiss' => 4
      ],
    ],
  ],
  2 => [
    1 => [
      'title' => 'Priit oli umbes',
      'labels' => [
        '3-aastane' => 1,
        '7-aastane' => 2,
        '13-aastane' => 3,
        '5-aastane' => 4
      ],
    ],
    2 => [
      'title' => 'Priidul oli hea meel, et',
      'labels' => [
        'ta vale üles tunnistas' => 1,
        'hammas välja tuli' => 2,
        'valel on lühikesed jalad' => 3,
        'ta on juba koolilaps' => 4
      ],
    ],
  ],
  3 => [
    'title' => 'Järjesta teksti põhjal laused. Pane lause taha õige number',
    'labels' => [
      1 => 'Isa lubas Priidu arsti juurde viia.',
      2 => 'Priidu üks esihammas oli öösel ära tulnud.',
      3 => 'Priit tunnistas üles, miks ta ei taha kooli minna.',
      4 => 'Priit ütles emale ja isale, et ta on haigeks jäänud.',
      5 => 'Priit läks rõõmsalt kooli.'
    ],
  ],
  4 => [
    1 => [
      'title' => 'Priit ütles, et tal valutavad',
      'labels' => [
        'hambad' => 1,
        'käed' => 2,
        'jalad' => 3,
        'turi ja kael' => 4
      ],
    ],
    2 => [
      'title' => 'Priit ei tahtnud kooli minna, sest',
      'labels' => [
        'tal ei olnud seal sõpru' => 1,
        'tal kõht valutas' => 2,
        'tal oli õppimata' => 3,
        'ta kartis narrimist' => 4
      ],
    ],
  ],
  5 => [
    1 => [
      'title' => 'Kooli minnes oli Priit',
      'labels' => [
        'rõõmus' => 1,
        'mures' => 2,
        'haige' => 3,
        'pahane' => 4
      ],
    ],
  ],
  6 => [
    1 => [
      'title' => 'Vastasid siin kaheksale küsimusele. Mis sa arvad, mitmele küsimusele vastasid õigesti?',
      'labels' => [
        '0','1','2','3','4','5','6','7','8'
      ],
      'align' => 'horizontal'
    ],
  ]
];

echo elgg_view_title($all[$page]['title']);

if ($page == 3)
{
  for ($i = 1; $i <= 5; $i += 1)
  {
    $label = '<p style="float:left;">'.$all[$page]['labels'][$i].'</p>';
    //echo $label;
    echo elgg_view_field([
      '#label' => $label,
      'name' => 'q'.$i,
      'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q'.$i],
      'options' => [
        '1' => '1.',
        '2' => '2.',
        '3' => '3.',
        '4' => '4.',
        '5' => '5.'
      ],
      '#type' => 'dropdown',
      'required' => true
    ]);  
  }
}
else
{
  for ($i = 1; $i <= 2; $i += 1)
{
  echo elgg_view_field([
    '#label' => $all[$page][$i]['title'],
    'name' => 'q'.$i,
    'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q1'],
    'options' => $all[$page][$i]['labels'],
    '#type' => 'radio',
    'align' => $all[$page][$i]['align'] ? $all[$page][$i]['align'] : 'vertical',
    'required' => true
  ]);
}
}

form_view_buttons($wcode, $page, $maxp, $poll);