<?php

const worksheets = [
  1 => [
    'name' => 'Lugemise metakognitsioon lastele',
    'file' => 'sheets/metacognition',
    'pages' => [ 
      1 => 6, 2 => 6, 3 => 6,
      4 => 6, 5 => 6, 6 => 6, 7 => 6 
    ],
  ],
  2 => [
    'name' => 'Lugemisülesanded',
    'file' => 'sheets/reading',
    'pages' => [ 
      1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 
      6 => 1, 7 => 1, 8 => 1, 9 => 1, 10 => 1,
      11 => 1, 12 => 1, 13 => 1, 14 => 1, 15 => 1, 
      16 => 1, 17 => 1, 18 => 1, 19 => 1, 20 => 1,
      21 => 1, 22 => 1, 23 => 1, 24 => 1, 25 => 1,
      26 => 1, 27 => 1, 28 => 1, 29 => 1, 30 => 1
    ],
  ],
  3 => [
    'name' => 'Kuidas õppida enne sekkumist',
    'file' => 'sheets/studytutorial',
    'pages' => [ 
      1 => 4, 2 => 6 
    ],
  ],
  4 => [
    'name' => 'Lugemismotivatsioon',
    'file' => 'sheets/motivation',
    'pages' => [ 
      1 => 3, 2 => 3, 3 => 3 
    ],
  ],
  5 => [
    'name' => 'Tekst "Õhusõidukid" 4. kl',
    'file' => 'sheets/text_plane',
    'pages' => [ 
      1 => 1, 2 => 1, 3 => 1, 4 => 1,
      5 => 1, 6 => 1, 7 => 1, 8 => 1, 9 => 1 
    ],
  ],
  6 => [
    'name' => 'Tekst "Paberilugu" 3. kl',
    'file' => 'sheets/text_paper',
    'pages' => [ 
      1 => 1, 2 => 1, 3 => 1, 4 => 1, 
      5 => 1, 6 => 1, 7 => 1, 8 => 1, 9 => 1 
    ],
  ],
  7 => [
    'name' => 'Tekst "Hambalugu" 2. kl',
    'file' => 'sheets/text_teeth',
    'pages' => [ 
      1 => 1, 2 => 1, 3 => 1, 4 => 1,
      5 => 5, 6 => 1, 7 => 1, 8 => 1, 9 => 1
    ],
  ],
];

function ee_echo($key)
{
  return elgg_echo($key, [], 'ee');
}

//fetches a worksheet object that matches the wcode
function get_sheet_from_wcode($wcode)
{
  $sheets = elgg_get_entities(array(
    'metadata_names' => array('wcode'),
    'metadata_values' => array($wcode)
  ));
  if (count($sheets) > 0)
  {
    $sheet = $sheets[0];
    return $sheet;
  }
}

//generate hidden fields for form page
function form_view_hidden_fields($wcode, $page, $maxp)
{
  echo elgg_view_field([
    '#type' => 'hidden',
    'name' => 'wcode',
    'value' => $wcode
  ]);
  echo elgg_view_field([
    '#type' => 'hidden',
    'name' => 'page',
    'value' => $page
  ]);
  echo elgg_view_field([
    '#type' => 'hidden',
    'name' => 'maxp',
    'value' => $maxp
  ]);
}

//generate buttons for form page
function form_view_buttons($wcode, $page, $maxp)
{
  if ($page > 1)
  {
    $href1 = elgg_generate_url('view:object:worksheet', [
      'wcode' => $wcode,
      'page' => $page - 1
    ]);
    echo '<a href="'.$href1.'" class="elgg-button elgg-button-action">'.ee_echo('polls:buttons:previous').'</a>';
  }

  $value = $page < $maxp ? ee_echo('polls:buttons:next') : ee_echo('polls:buttons:submit');
  echo '<button value="'.'" type="submit" class="elgg-button elgg-button-submit" style="display:inline-block; float:left">'.$value."</button>";
}

function form_view_radios($labels, $wcode, $id)
{
  for ($i = 0; $i < count($labels); $i += 1)
  {
    $ipp = $i + 1;
    echo elgg_view_field([
      '#label' => $labels[$i],
      'name' => 'q'.$ipp,
      'value' => $_SESSION[$wcode.'p'.$id.'q'.$ipp],
      'options' => [
        'Jah' => 'jah',
        'Ei' => 'ei'
      ],
      '#type' => 'radio',
      'align' => 'horizontal',
      'required' => true
    ]);
  }
}

function form_view_radio($label, $wcode, $page, $question)
{
  echo elgg_view_field([
    '#label' => $label,
    'name' => 'q'.$question,
    'value' => $_SESSION[$wcode.'p'.$page.'q'.$question],
    'options' => [
      'Jah' => 'jah',
      'Ei' => 'ei',
      'Ei tea' => 'ei tea'
    ],
    '#type' => 'radio',
    'align' => 'horizontal',
    'required' => true
  ]);
}

function form_view_3emoticons($labels, $wcode, $page)
{
  for ($i = 0; $i < 3; $i = $ipp)
  {
    $ipp = $i + 1;
    echo elgg_view_field([
      '#label' => $labels[$i],
      'name' => 'q'.$ipp,
      'value' => $_SESSION[$wcode.'p'.$page.'q'.$ipp],
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
}

function uldpadevused_init() {
  //visiteeri http://localhost:8888/cron/minute et esile kutsuda

  elgg_register_plugin_hook_handler('cron', 'minute', function() {
    $notstarted = elgg_get_entities(array(
      'type' => 'object',
      'subtype' => 'worksheet',
      'limit' => 0,
      'metadata_names' => array('state'),
      'metadata_values' => array('Algamas')
    ));

    $format = 'd-m-Y';
    $tallinn = timezone_open('Europe/Tallinn');
    $now = date_create("now", $tallinn);
    $u2 = date_timestamp_get($now);

    //Check through unstarted questionnaires and start them if necessary
    foreach ($notstarted as $sheet)
    {
      $start_date = $sheet->wdate;
      $start_time = $sheet->wtime;
      $date = date_create_from_format($format, $start_date, $tallinn);

      $u1 = date_timestamp_get($date);

      if ($u1 <= $u2)
      {
        $sheet->state = "Alanud";
      }
    }

    $started = elgg_get_entities(array(
      'type' => 'object',
      'subtype' => 'worksheet',
      'limit' => 0,
      'metadata_names' => array('state'),
      'metadata_values' => array('Alanud')
    ));

    //Check through started questionnaires and finish them if necessary
    foreach ($started as $sheet)
    {
      $end_time = $sheet->wtend;
      $date = date_create_from_format($format, $end_time, $tallinn);

      $u1 = date_timestamp_get($date);

      if ($u1 <= $u2)
      {
        $sheet->state = "Lõppenud";
      }
    }
 });

 elgg_register_simplecache_view('graphics/bus_stop.png');
}

return function() {
  elgg_register_event_handler('init', 'system', 'uldpadevused_init');
};