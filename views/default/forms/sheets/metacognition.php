<?php
session_start();
elgg_require_js('uldpadevused/metacognition');

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp);

$all = [
  1 => [
    'title' => 'Mida on kasulik teha enne lugemist?',
    'labels' => [
      'Mõtlen, mida ma selle teema kohta juba tean.',
      'Esitan küsimusi teksti kohta ja vastan nendele.',
      'Loen läbi viimase lause, siis ma tean, kuidas tekst lõpeb.',
      'Mõtlen, millest see tekst võiks rääkida.',
      'Vaatan hoolikalt pealkirja ja pilti.',
      'Leian tekstist kõige olulisemad sõnad.'
    ]
  ],
  2 => [
    'title' => 'Mida on kasulik teha lugemise ajal?',
    'labels' => [
      'Loen keerulised kohad kiiresti läbi.',
      'Katkestan lugemise aeg-ajalt ja mõtlen, kuidas tekst võiks jätkuda.',
      'Esitan endale küsimusi teksti kohta ja vastan nendele.',
      'Pean arvestust, mitu lehekülge ma olen juba läbi lugenud.',
      'Loen läbi viimased laused, siis ma tean, kuidas tekst lõpeb.',
      'Leian loetud tekstist kõige olulisemad kohad.',
    ]
  ],
  3 => [
    'title' => 'Mida on kasulik teha pärast lugemist?',
    'labels' => [
      'Esitan endale teksti kohta küsimusi ja vastan nendele.',
      'Loen kokku, mitmest sõnast ma aru ei saanud.',
      'Kontrollin, kas ma olen seda teksti varem lugenud.',
      'Küsin endalt, kas ma sain tekstist aru.',
      'Jutustan enda sõnadega, mida ma lugesin.',
      'Loen kokku, mitu lehekülge ma lugesin ilma vigu tegemata.',
    ]
  ],
  4 => [
    'title' => 'Mida on kasulik teha, et kontrollida, kas ma saan tekstist aru?',
    'labels' => [
      'Kontrollin, ega ma ei jätnud vahele ühtegi sõna.',
      'Loen pealkirja uuesti.',
      'Püüan leida jutust kõige olulisemad kohad.',
      'Jutustan enda sõnadega, mida lugesin.',
      'Küsin enda käest, kuidas tekst jätkub.',
      'Esitan endale teksti kohta küsimusi ja vastan nendele.'
    ]
  ],
  5 => [
    'title' => 'Mida on kasulik teha, kui ma ei saa mingist sõnast aru?',
    'labels' => [
      'Kirjutan selle sõna kaks korda läbi.',
      'Vaatan pilte.',
      'Kontrollin, kas see sõna on tekstis seletatud.',
      'Loen läbi teksti viimase lause.',
      'Vaatan teisi sõnu selle sõna ümber',
      'Mõtlen pealkirja peale.'
    ]
  ],
  6 => [
    'title' => 'Mida on kasulik teha, kui ma ei saa mingist lausest aru?',
    'labels' => [
      'Loen läbi teksti viimase lause',
      'Loen kokku, kui palju lauseid pean veel lugema.',
      'Vaatan sõnastikust selles lauses olevate keerukate sõnade tähendusi.',
      'Hüppan sellest lausest üle.',
      'Loen väikese tekstiosa uuesti läbi.',
      'Püüan korrata seda lauset oma sõnadega.'
    ]
  ],
  7 => [
    'title' => 'Mida on kasulik teha, kui tekst läheb keeruliseks?',
    'labels' => [
      'Loen keerulise koha kiiresti läbi',
      'Loen väikese osa tekstist uuesti läbi.',
      'Otsin üles kõik pikad sõnad',
      'Loen kokku, mitmest lausest ma aru ei saa.',
      'Loen kokku, kui palju lehekülgi pean veel lugema.',
      'Jutustan oma sõnadega, mida ma lugesin.'
    ]
  ]
];

echo elgg_view_title($all[$page]['title']);
form_view_radios($all[$page]['labels'], $wcode, $page);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);