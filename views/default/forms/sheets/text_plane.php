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
    'title' => '1. Kuumaõhupall leiutati',
    'labels' => [
      'Itaalias' => 1,
      'Prantsusmaal' => 2,
      'Ameerikas' => 3,
      'Kreekas' => 4
    ],
  ],
  2 => [
    'title' => 'Esimesed õhupalliga reisijad olid',
    'labels' => [
      'lammas, part ja kukk' => 1,
      'vennad Wrightid' => 2,
      "vennad Montgolfier'id" => 3,
      'Jean Pierre Blanchard' => 4
    ],
  ],
  3 => [
    'title' => 'Esimene ümbermaailmareis õhupalliga toimus',
    'labels' => [
      'üle 200 aasta tagasi' => 1,
      'üle 100 aasta tagasi' => 2,
      '1999. aastal' => 3,
      '1919. aastal' => 4
    ],
  ],
  4 => [
    'title' => 'Missugune järgmistest väidetest ei käi esimese lennuki kohta?',
    'labels' => [
      'Lennuk ehitati Ameerikas.' => 1,
      'Esimese stardi juures viibis Ameerika president George Washington.' => 2,
      'Lennuk oli ehitatud puidust ja sellel oli üks mootor.' => 3,
      'Lennuk ehitati eelmise sajandi alguses.' => 4
    ],
  ],
  5 => [
    'title' => 'Reisilennukeid on kasutatud',
    'labels' => [
      'umbes 200 aastat' => 1,
      'umbes 150 aastat' => 2,
      'umbes 100 aastat' => 3,
      'umbes 50 aastat' => 4
    ],
  ],
  6 => [
    'title' => 'Üle lennuki tiiva kumera pinna liigub õhk',
    'labels' => [
      'aeglasemalt kui üle tiiva alumise pinna' => 1,
      'aeglasemalt kui üle tiiva ülemise pinna' => 2,
      'kiiremini kui üle tiiva alumise pinna' => 3,
      'kiiremini kui üle tiiva ülemise pinna' => 4
    ],
  ],
  7 => [
    'title' => 'Teksti sõna "ülehelikiirusel" tähendab',
    'labels' => [
      'sama kiiresti kui heli' => 1,
      'kiiremini kui heli' => 2,
      'valguse kiirusel' => 3,
      'ülitugevat heli tekitades' => 4
    ],
  ],
  8 => [
    'title' => 'Teksti eesmärk on',
    'labels' => [
      'anda teavet õhupallide ehitusest' => 1,
      'tutvustada sõjalennukite ajalugu' => 2,
      'näidata, et õhusõidukitega lendamine on ohtlik' => 3,
      'anda teavet õhusõidukite ajaloost ja töötamise põhimõtetest' => 4
    ],
  ],
  9 => [
    'title' => 'Vastasid siin kaheksale küsimusele. Mis sa arvad, mitmele küsimusele vastasid õigesti?',
    'labels' => [
      '0','1','2','3','4','5','6','7','8'
    ],
    'align' => 'horizontal'
  ]
];

echo elgg_view_title($all[$page]['title']);
echo elgg_view_field([
  '#label' => '',
  'name' => 'q1',
  'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page],
  'options' => $all[$page]['labels'],
  '#type' => 'radio',
  'align' => $all[$page]['align'] ? $all[$page]['align'] : 'vertical',
  'required' => true
]);
form_view_buttons($wcode, $page, $maxp, $poll);