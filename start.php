<?php

const worksheets = [
  [
    'name' => 'Lugemise metakognitsioon lastele',
    'file' => 'sheets/metacognition',
    'pages' => 7,
    'csvstart' => '"Nimi","Sugu","Vanus",'.
      '"1.1","1.2","1.3","1.4","1.5","1.6",'.
      '"2.1","2.2","2.3","2.4","2.5","2.6",'.
      '"3.1","3.2","3.3","3.4","3.5","3.6",'.
      '"4.1","4.2","4.3","4.4","4.5","4.6",'.
      '"5.1","5.2","5.3","5.4","5.5","5.6",'.
      '"6.1","6.2","6.3","6.4","6.5","6.6",'.
      '"7.1","7.2","7.3","7.4","7.5","7.6"'.
      "\n"
  ],
  [
    'name' => 'Lugmot-laused 4klass',
    'file' => 'sheets/metacognition4',
    'pages' => 30,
    'csvstart' => '"Nimi","Sugu","Vanus",'.
    '"1.1","1.2","1.3","1.4","1.5","1.6",'.
    '"1.7","1.8","1.9","1.10","1.11","1.12",'.
    '"1.13","1.14","1.15","1.16","1.17","1.18",'.
    '"1.19","1.20","1.21","1.22","1.23","1.24",'.
    '"1.25","1.26","1.27","1.28","1.29","1.30"'.
      "\n"
  ],
  [
    'name' => 'Kuidas õppida enne sekkumist',
    'file' => 'sheets/studytutorial',
    'pages' => 2,
    'csvstart' => '"Nimi","Sugu","Vanus",'.
    '"1.1","1.2","1.3","1.4","2.1","2.2",'.
    '"2.3","2.4","2.5","2.6"'.
    "\n"
  ],
  [
    'name' => 'Lugemismotivatsioon',
    'file' => 'sheets/motivation',
    'pages' => 3,
    'csvstart' => '"Nimi","Sugu","Vanus",'.
    '"1","2","3","4","5","6","7","8","9"'.
    "\n"
  ]
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

//forwards to next page of given worksheet
function forward_next_url($wcode, $page)
{
  $url = elgg_generate_url('view:object:worksheet', [
    'wcode' => $wcode,
    'page' => $page + 1
  ]);
  forward($url);
}

function forward_home()
{
  $url = elgg_generate_url('index');
  forward($url);
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
  $value = $page < $maxp ? ee_echo('polls:buttons:next') : ee_echo('polls:buttons:submit');
  echo '<button value="'.'" type="submit" class="elgg-button elgg-button-submit" style="display:inline-block; float:left">'.$value."</button>";
  
  if ($page > 1)
  {
    $href1 = elgg_generate_url('view:object:worksheet', [
      'wcode' => $wcode,
      'page' => $page - 1
    ]);
    echo '<a href="'.$href1.'" class="elgg-button elgg-button-action">'.ee_echo('polls:buttons:previous').'</a>';
  }
}

function is_time_up($wcode) {
  $sheet = get_sheet_from_wcode($wcode);
  $limit = $sheet->limit;
  //check if the time is up
  $start = $_SESSION[$wcode.'start'];
  $tallinn = timezone_open('Europe/Tallinn');
  $now = date_create("now", $tallinn);
  $unix = date_timestamp_get($now);

  return $unix - $start >= $limit;
}

function form_metacognition_save($wcode) {
  //retrieve data from session and write it to a new line.
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'",';
  for ($i = 1; $i <= 7; $i += 1)
  {
    $part = $wcode.'p'.$i.'q';
    for ($k = 1; $k <= 6; $k += 1)
    {
      $value = $_SESSION[$part.$k];
      /*if (!$value)
      {
        register_error($i.'.'.$k.' on vastamata!');
        forward(REFERER);
      }*/
      $csvline .= '"'.$value.'"';
      if ($k < 6) $csvline .= ',';
    }
    if ($i < 7) $csvline .= ',';
  }
  $csvline .= "\n";
  
  //add made csv line to sheet csv
  add_csv_to_sheet($wcode, $csvline);
}

function form_metacognition4_save($wcode) {
  //retrieve data from session and write it to a new line.
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'",';
  for ($i = 1; $i <= 36; $i += 1)
  {
    $value = $_SESSION[$wcode.'p'.$i];
    $csvline .= '"'.$value.'"';
    if ($i < 36) $csvline .= ',';
  }
  $csvline .= "\n";

  //add made csv line to sheet csv
  add_csv_to_sheet($wcode, $csvline);
}

function form_studytutorial_save($wcode) {
  //retrieve data from session and write it to a new line.
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'",';
  for ($i = 1; $i <= 4; $i += 1)
  {
    $value = $_SESSION[$wcode.'p1q'.$i];
    $csvline .= '"'.$value.'",';
  }
  for ($i = 1; $i <= 6; $i += 1)
  {
    $value = $_SESSION[$wcode.'p2q'.$i];
    $csvline .= '"'.$value.'"';
    if ($i < 6) $csvline .= ',';
  }
  $csvline .= "\n";

  //add made csv line to sheet csv
  add_csv_to_sheet($wcode, $csvline);
}

function form_motivation_save($wcode) {
  //retrieve data from session and write it to a new line.
  $csvline = '"'.$_SESSION[$wcode.'name'].'","'.
  $_SESSION[$wcode.'gender'].'","'.
  $_SESSION[$wcode.'age'].'",';
  for ($i = 1; $i <= 3; $i += 1)
  {
    $part = $wcode.'p'.$i.'q';
    for ($k = 1; $k <= 3; $k += 1)
    {
      $value = $_SESSION[$part.$k];
      /*if (!$value)
      {
        register_error($i.'.'.$k.' on vastamata!');
        forward(REFERER);
      }*/
      $csvline .= '"'.$value.'"';
      if ($k < 3) $csvline .= ',';
    }
    if ($i < 3) $csvline .= ',';
  }
  $csvline .= "\n";
  
  //add made csv line to sheet csv
  add_csv_to_sheet($wcode, $csvline);
}

function add_csv_to_sheet($wcode, $csvline)
{
  $sheet = get_sheet_from_wcode($wcode);
  $csv = $sheet->csv;
  $csv .= $csvline;
  $sheet->csv = $csv;

  //increase sheet replies
  $replies = $sheet->replies;
  $replies = strval(intval($replies) + 1);
  $sheet->replies = $replies;

  $sheet->save();
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
}

return function() {
  elgg_register_event_handler('init', 'system', 'uldpadevused_init');
};