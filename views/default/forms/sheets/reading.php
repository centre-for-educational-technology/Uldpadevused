<?php
session_start();
elgg_require_js('uldpadevused/reading');
elgg_load_css('reading');

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp, $poll);

$all = [
  2 => [
    'title' => 'Õige või vale?',
    'label' => 'Putru võib süüa.'
  ],
  3 => [
    'title' => 'Õige või vale?',
    'label' => 'Jõhvikad on sinised.'
  ],
  4 => [
    'title' => 'Õige või vale?',
    'label' => 'Pliidil võib valmistada toite.'
  ],
  5 => [
    'title' => 'Õige või vale?',
    'label' => 'Tuulise ilmaga lehvivad lipud.'
  ],
  6 => [
    'title' => 'Õige või vale?',
    'label' => 'Õunad oskavad rääkida.'
  ],
  7 => [
    'title' => 'Õige või vale?',
    'label' => 'Aastas on kaksteist kuud.'
  ],
  8 => [
    'title' => 'Õige või vale?',
    'label' => 'Paberile kirjutatakse pliiatsiga.'
  ],
  9 => [
    'title' => 'Õige või vale?',
    'label' => 'Mari on tavaline poisinimi.'
  ],
  10 => [
    'title' => 'Õige või vale?',
    'label' => 'Jäätis on kuum ja soolase maitsega.'
  ],
  11 => [
    'title' => 'Õige või vale?',
    'label' => 'Vannitubades on kraanikauss ja pliit.'
  ],
  12 => [
    'title' => 'Õige või vale?',
    'label' => 'Ploomid, pirnid ja pihlakamarjad kasvavad puu otsas.'
  ],
  13 => [
    'title' => 'Õige või vale?',
    'label' => 'Maasikamoosi tehakse pannkoogitaignast.'
  ],
  14 => [
    'title' => 'Õige või vale?',
    'label' => 'Tormi ajal on tuulevaikus ja päike paistab.'
  ],
  15 => [
    'title' => 'Õige või vale?',
    'label' => 'Tiigrid on suured loomad, kellel on triibuline karvkate.'
  ],
  16 => [
    'title' => 'Õige või vale?',
    'label' => 'Sügiskuud on september, oktoober ja november.'
  ],
  17 => [
    'title' => 'Õige või vale?',
    'label' => 'Talvel, kui lumi on maas, saab kelgutada ja suusatada.'
  ],
  18 => [
    'title' => 'Õige või vale?',
    'label' => 'Sellist inimest, kes teeb teistele süüa, nimetatakse koristajaks.'
  ],
  19 => [
    'title' => 'Õige või vale?',
    'label' => 'Eesti metsades elab väga palju sebrasid ja lõvisid.'
  ],
  20 => [
    'title' => 'Õige või vale?',
    'label' => 'Selleks et sokid jalga panna, tuleb enne kingad jalga panna.'
  ],
  21 => [
    'title' => 'Õige või vale?',
    'label' => 'Kiirabiautoga veetakse vanu katkisi saapaid.'
  ],
  22 => [
    'title' => 'Õige või vale?',
    'label' => 'Kraadiklaas on seade, mille abil saab vaadata, kui soe ilm õues on.'
  ],
  23 => [
    'title' => 'Õige või vale?',
    'label' => 'Metsas marju korjates peab olema ettevaatlik, sest on olemas ka mürgiseid marju.'
  ],
  24 => [
    'title' => 'Õige või vale?',
    'label' => 'Täiskasvanud on sageli tööpäeva lõpus väsinud, sest on tantsinud kogu päeva.'
  ],
  25 => [
    'title' => 'Õige või vale?',
    'label' => 'Ühed maailma kiireimad loomad on teod, sest nad on osavad ja neil on pikad jalad.'
  ],
  26 => [
    'title' => 'Õige või vale?',
    'label' => 'Enne kui sa õhtul magama lähed, tuleb kindlasti ära pesta hambad.'
  ],
  27 => [
    'title' => 'Õige või vale?',
    'label' => 'Et valmistada maitsvat küpsisetorti, tuleb enne osta küpsiseid, hapukoort ja kartuleid.'
  ],
  28 => [
    'title' => 'Õige või vale?',
    'label' => 'Kehalise kasvatuse tunnis joostakse, ujutakse, hüpatakse, painutatakse, kirjutatakse, süüakse ja võimeldakse.'
  ],
  29 => [
    'title' => 'Õige või vale?',
    'label' => 'Tuulise ja vihmase ilmaga tasub õue minnes võtta kaasa vihmavari, sest sellega saab igale poole lennata.'
  ],
  30 => [
    'title' => 'Õige või vale?',
    'label' => 'Tüdruk, kellel on punased juuksed, tedretähnid, erinevatest paaridest sukad ja hiigelsuured kingad ning kes jaksab üles tõsta hobuse, on Pöial-Liisi.'
  ],
  31 => [
    'title' => 'Õige või vale?',
    'label' => 'Kuna vaid vähesed õpilased, nagu sina, jõuavad ühe minutiga selle lauseni, võid olla kindel, et oled hea lugeja.'
  ]
];

if ($page == 1)
{
  echo elgg_view_title("Järgnev küsitlus on aja peale.");
  echo "<p>Sul on aega 60 sekundit, et vastata 30-le küsimusele. Vasta nii mitmele, kui jõuad.<p>";
  echo '<p>Aeg läheb käima, kui vajutad nuppu "Alusta".<p>';
  echo '<button value="" type="submit" class="elgg-button elgg-button-submit">Alusta</button>';
}
else
{
  echo elgg_view_title($all[$page]['title']);
  echo elgg_view_field([
    '#label' => $all[$page]['label'],
    'name' => 'q1',
    'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q1'],
    'options' => [
      'Õige' => 'oige',
      'Vale' => 'vale'
    ],
    '#type' => 'radio',
    'align' => 'horizontal',
    'required' => true
  ]);
  echo '<button type="submit" style="width:0;height:0;margin:0;padding:0"></button>';
}