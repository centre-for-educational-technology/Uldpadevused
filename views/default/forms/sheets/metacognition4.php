<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);

$all = [
  1 => [
    'title' => 'Vali sulle sobiv vastus!',
    'label' => 'Ma loen hästi.'
  ],
  2 => [
    'title' => 'Vali sulle sobiv vastus!',
    'label' => 'Lugeda on tore.'
  ],
  3 => [
    'title' => 'Vali sulle sobiv vastus!',
    'label' => 'Ma olen hea lugeja.'
  ],
  4 => [
    'title' => 'Vali sulle sobiv vastus!',
    'label' => 'Mulle meeldib koolis lugeda.'
  ],
  5 => [
    'title' => 'Vali sulle sobiv vastus!',
    'label' => 'Lugemine on minu jaoks raske.'
  ],
  6 => [
    'title' => 'Vali sulle sobiv vastus!',
    'label' => 'Mulle meeldib kodus lugeda.'
  ],
  7 => [
    'title' => 'Õige või vale?',
    'label' => 'Putru võib süüa.'
  ],
  8 => [
    'title' => 'Õige või vale?',
    'label' => 'Jõhvikad on sinised.'
  ],
  9 => [
    'title' => 'Õige või vale?',
    'label' => 'Pliidil võib valmistada toite.'
  ],
  10 => [
    'title' => 'Õige või vale?',
    'label' => 'Tuulise ilmaga lehvivad lipud.'
  ],
  11 => [
    'title' => 'Õige või vale?',
    'label' => 'Õunad oskavad rääkida.'
  ],
  12 => [
    'title' => 'Õige või vale?',
    'label' => 'Aastas on kaksteist kuud.'
  ],
  13 => [
    'title' => 'Õige või vale?',
    'label' => 'Paberile kirjutatakse pliiatsiga.'
  ],
  14 => [
    'title' => 'Õige või vale?',
    'label' => 'Mari on tavaline poisinimi.'
  ],
  15 => [
    'title' => 'Õige või vale?',
    'label' => 'Jäätis on kuum ja soolase maitsega.'
  ],
  16 => [
    'title' => 'Õige või vale?',
    'label' => 'Vannitubades on kraanikauss ja pliit.'
  ],
  17 => [
    'title' => 'Õige või vale?',
    'label' => 'Ploomid, pirnid ja pihlakamarjad kasvavad puu otsas.'
  ],
  18 => [
    'title' => 'Õige või vale?',
    'label' => 'Maasikamoosi tehakse pannkoogitaignast.'
  ],
  19 => [
    'title' => 'Õige või vale?',
    'label' => 'Tormi ajal on tuulevaikus ja päike paistab.'
  ],
];

if ($page > 6)
{
  create_lugmot_form($wcode, $page, $maxp, $all[$page]['title'], $all[$page]['label']);
}
else
{
  create_lugmot_form2($wcode, $page, $maxp, $all[$page]['title'], $all[$page]['label']);
}