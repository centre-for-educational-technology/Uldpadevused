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
  20 => [
    'title' => 'Õige või vale?',
    'label' => 'Tiigrid on suured loomad, kellel on triibuline karvkate.'
  ],
  21 => [
    'title' => 'Õige või vale?',
    'label' => 'Sügiskuud on september, oktoober ja november.'
  ],
  22 => [
    'title' => 'Õige või vale?',
    'label' => 'Talvel, kui lumi on maas, saab kelgutada ja suusatada.'
  ],
  23 => [
    'title' => 'Õige või vale?',
    'label' => 'Sellist inimest, kes teeb teistele süüa, nimetatakse koristajaks.'
  ],
  24 => [
    'title' => 'Õige või vale?',
    'label' => 'Eesti metsades elab väga palju sebrasid ja lõvisid.'
  ],
  25 => [
    'title' => 'Õige või vale?',
    'label' => 'Selleks et sokid jalga panna, tuleb enne kingad jalga panna.'
  ],
  26 => [
    'title' => 'Õige või vale?',
    'label' => 'Kiirabiautoga veetakse vanu katkisi saapaid.'
  ],
  27 => [
    'title' => 'Õige või vale?',
    'label' => 'Kraadiklaas on seade, mille abil saab vaadata, kui soe ilm õues on.'
  ],
  28 => [
    'title' => 'Õige või vale?',
    'label' => 'Metsas marju korjates peab olema ettevaatlik, sest on olemas ka mürgiseid marju.'
  ],
  29 => [
    'title' => 'Õige või vale?',
    'label' => 'Täiskasvanud on sageli tööpäeva lõpus väsinud, sest on tantsinud kogu päeva.'
  ],
  30 => [
    'title' => 'Õige või vale?',
    'label' => 'Ühed maailma kiireimad loomad on teod, sest nad on osavad ja neil on pikad jalad.'
  ],
  31 => [
    'title' => 'Õige või vale?',
    'label' => 'Enne kui sa õhtul magama lähed, tuleb kindlasti ära pesta hambad.'
  ],
  32 => [
    'title' => 'Õige või vale?',
    'label' => 'Et valmistada maitsvat küpsisetorti, tuleb enne osta küpsiseid, hapukoort ja kartuleid.'
  ],
  33 => [
    'title' => 'Õige või vale?',
    'label' => 'Kehalise kasvatuse tunnis joostakse, ujutakse, hüpatakse, painutatakse, kirjutatakse, süüakse ja võimeldakse.'
  ],
  34 => [
    'title' => 'Õige või vale?',
    'label' => 'Tuulise ja vihmase ilmaga tasub õue minnes võtta kaasa vihmavari, sest sellega saab igale poole lennata.'
  ],
  35 => [
    'title' => 'Õige või vale?',
    'label' => 'Tüdruk, kellel on punased juuksed, tedretähnid, erinevatest paaridest sukad ja hiigelsuured kingad ning kes jaksab üles tõsta hobuse, on Pöial-Liisi.'
  ],
  36 => [
    'title' => 'Õige või vale?',
    'label' => 'Kuna vaid vähesed õpilased, nagu sina, jõuavad ühe minutiga selle lauseni, võid olla kindel, et oled hea lugeja.'
  ]
];

if ($page > 6)
{
  create_lugmot_form($wcode, $page, $maxp, $all[$page]['title'], $all[$page]['label']);
}
else
{
  create_lugmot_form2($wcode, $page, $maxp, $all[$page]['title'], $all[$page]['label']);
}