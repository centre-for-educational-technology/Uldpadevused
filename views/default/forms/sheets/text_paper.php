<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);

if ($page < 5)
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
      'title' => 'Paberi valmistamine sai alguse',
      'labels' => [
        'Jaapanist' => 1,
        'Hiinast' => 2,
        'Euroopast' => 3,
        'Eestist' => 4
      ],
    ],
    2 => [
      'title' => 'Paberi valmistamine masinate abil algas umbes',
      'labels' => [
        '200 aastat tagasi' => 1,
        '700 aastat tagasi' => 2,
        '1000 aastat tagasi' => 3,
        '2000 aastat tagasi' => 4
      ],
    ],
  ],
  2 => [
    1 => [
      'title' => 'Tänapäeval kasutatakse paberi tootmiseks',
      'labels' => [
        'puukoort' => 1,
        'linakiudu' => 2,
        'õlgi' => 3,
        'puitu' => 4
      ],
    ],
    2 => [
      'title' => 'Paberit ei kasutata',
      'labels' => [
        'plastiku tootmisel' => 1,
        'pakendite tootmisel' => 2,
        'raamatute tootmisel' => 3,
        'ajalehtede tootmisel' => 4
      ],
    ],
  ],
  3 => [
    1 => [
      'title' => 'Teksti sõna "lagundama" tähendab',
      'labels' => [
        'laduma' => 1,
        'katki tegema' => 2,
        'pressima' => 3,
        'siluma' => 4
      ],
    ],
    2 => [
      'title' => '1000 aastat tagasi valmistati Euroopas paberit',
      'labels' => [
        'masinatega' => 1,
        'vanapaberist' => 2,
        'loomanahast' => 3,
        'käsitsi' => 4
      ],
    ],
  ],
  4 => [
    1 => [
      'title' => 'Paberit ei tohi raisata, sest',
      'labels' => [
        'paberi tootmiseks kulutatakse palju puitu ja vett' => 1,
        'paber aitab hoida loodusvarasid' => 2,
        'paber on tähtis loodusvara' => 3,
        'vanapaberit ei saa enam kasutada' => 4
      ],
    ],
    2 => [
      'title' => '1000 aastat tagasi suutsid kolm töölist valmistada päevas',
      'labels' => [
        'kolm lehte paberit' => 1,
        '200 lehte paberit' => 2,
        '700 kuni 800 lehte paberit' => 3,
        '1000 lehte paberit' => 4
      ],
    ],
  ],
  5 => [
    1 => [
      'title' => 'Vastasid siin kaheksale küsimusele. Mis sa arvad, mitmele küsimusele vastasid õigesti?',
      'labels' => [
        '0','1','2','3','4','5','6','7','8'
      ],
      'align' => 'horizontal'
    ]
  ]
];

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
form_view_buttons($wcode, $page, $maxp, $poll);