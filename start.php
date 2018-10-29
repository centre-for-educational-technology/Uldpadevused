<?php

const worksheets = [
  [
    'name' => 'Lugemise metakognitsioon lastele',
    'folder' => 'lumela',
    'pages' => [
      1 => 'lumela1', 2 => 'lumela2', 3 => 'lumela3',
      4 => 'lumela4', 5 => 'lumela5', 6 => 'lumela6',
      7 => 'lumela7'
    ],
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
    'folder' => 'lugmot',
    'pages' => [
      1 => 'sobiv1', 2 => 'sobiv2', 3 => 'sobiv3',
      4 => 'sobiv4', 5 => 'sobiv5', 6 => 'sobiv6',
      7 => 'vale1', 8 => 'vale2', 9 => 'vale3', 10 => 'vale4',
      11 => 'vale5', 12 => 'vale6', 13 => 'vale7', 14 => 'vale8',
      15 => 'vale9', 16 => 'vale10', 17 => 'vale11', 18 => 'vale12',
      19 => 'vale13', 20 => 'vale14', 21 => 'vale15', 22 => 'vale16',
      23 => 'vale17', 24 => 'vale18', 25 => 'vale19', 26 => 'vale20',
      27 => 'vale21', 28 => 'vale22', 29 => 'vale23', 30 => 'vale24',
      31 => 'vale25', 32 => 'vale26', 33 => 'vale27', 34 => 'vale28',
      35 => 'vale29', 36 => 'vale30'
    ],
    'csvstart' => '"Nimi","Sugu","Vanus",'.
    '"1.1","1.2","1.3","1.4","1.5","1.6",'.
    '"2.1","2.2","2.3","2.4","2.5","2.6",'.
    '"2.7","2.8","2.9","2.10","2.11","2.12",'.
    '"2.13","2.14","2.15","2.16","2.17","2.18",'.
    '"2.19","2.20","2.21","2.22","2.23","2.24",'.
    '"2.25","2.26","2.27","2.28","2.29","2.30"'.
      "\n"
  ],
  [
    'name' => 'Kuidas õppida enne sekkumist',
    'folder' => 'upased',
    'pages' => [
      1 => 'mata', 2 => 'emakeel'
    ],
    'csvstart' => '"Nimi","Sugu","vanus",'.
    '"1.1","1.2","1.3","1.4","2.1","2.2",'.
    '"2.3","2.4","2.5","2.6"'.
    "\n"
  ]
];

function create_lugmot_form($wcode, $page, $maxp, $title, $label)
{
  //make hidden fields
  form_view_hidden_fields($wcode, $page);

  echo elgg_view_title($title);
  echo elgg_view_field([
    '#label' => $label,
    'name' => 'q',
    'value' => $_SESSION[$wcode.'p'.$page],
    'options' => [
      'Õige' => 'õige',
      'Vale' => 'vale'
    ],
    '#type' => 'radio',
    'align' => 'horizontal',
    'required' => true
  ]);

  //make appropriate buttons in the end
  form_view_buttons($wcode, $page, $maxp);
}

function ee_echo($key)
{
  return elgg_echo($key, [], 'ee');
}

function create_lugmot_form2($wcode, $page, $maxp, $title, $label)
{
  //make hidden fields
  form_view_hidden_fields($wcode, $page);

  echo elgg_view_title($title);
  echo elgg_view_field([
    '#label' => $label,
    'name' => 'q',
    'value' => $_SESSION[$wcode.'p'.$page],
    'options' => [
      'Jah' => 'jah',
      'Ei' => 'ei'
    ],
    '#type' => 'radio',
    'align' => 'horizontal',
    'required' => true
  ]);

  //make appropriate buttons in the end
  form_view_buttons($wcode, $page, $maxp);
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
function form_view_hidden_fields($wcode, $page)
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
}

//generate buttons for form page
function form_view_buttons($wcode, $page, $maxp)
{
  $value = $page < $maxp ? "Järgmine küsimus" : "Saada ära";
  echo '<button value="'.'" type="submit" class="elgg-button elgg-button-submit" style="display:inline-block; float:left">'.$value."</button>";
  
  if ($page > 1)
  {
    $href1 = elgg_generate_url('view:object:worksheet', [
      'wcode' => $wcode,
      'page' => $page - 1
    ]);
    echo '<a href="'.$href1.'" class="elgg-button elgg-button-action">Eelmine küsimus</a>';
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

function form_lumela_save($wcode) {
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

function form_lugmot_save($wcode) {
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

function form_upased_save($wcode) {
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

    $format = 'd-m-Y H:i';
    $tallinn = timezone_open('Europe/Tallinn');
    $now = date_create("now", $tallinn);
    $u2 = date_timestamp_get($now);

    //Check through unstarted questionnaires and start them if necessary
    foreach ($notstarted as $sheet)
    {
      $start_date = $sheet->wdate;
      $start_time = $sheet->wtime;
      $date = date_create_from_format($format, $start_date.' '.$start_time, $tallinn);

      $u1 = date_timestamp_get($date);

      if ($u1 < $u2)
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

      if ($u1 < $u2)
      {
        $sheet->state = "Lõppenud";
      }
    }
 });
}

return function() {
  elgg_register_event_handler('init', 'system', 'uldpadevused_init');
};