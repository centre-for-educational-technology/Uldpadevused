<?php

const worksheets = [
  1 => [
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
    'timelimit' => 60,
    'alias' => '60sec'
  ],
  2 => [
    'name' => 'Lugemise metakognitsioon lastele',
    'file' => 'sheets/metacognition',
    'pages' => [ 
      1 => 6, 2 => 6, 3 => 6,
      4 => 6, 5 => 6, 6 => 6, 7 => 6 
    ],
    'timelimit' => 86400,
    'alias' => 'meta'
  ],
  3 => [
    'name' => 'Kuidas õppida enne sekkumist',
    'file' => 'sheets/studytutorial',
    'pages' => [ 
      1 => 4, 2 => 6 
    ],
    'timelimit' => 86400,
    'alias' => 'kuidas'
  ],
  4 => [
    'name' => 'Lugemismotivatsioon',
    'file' => 'sheets/motivation',
    'pages' => [ 
      1 => 3, 2 => 3, 3 => 3 
    ],
    'timelimit' => 86400,
    'alias' => 'motiiv'
  ],
  5 => [
    'name' => 'Tekst "Õhusõidukid" 4. kl',
    'file' => 'sheets/text_plane',
    'pages' => [ 
      1 => 1, 2 => 1, 3 => 1, 4 => 1,
      5 => 1, 6 => 1, 7 => 1, 8 => 1, 9 => 1 
    ],
    'timelimit' => 86400,
    'alias' => 'lennuk'
  ],
  6 => [
    'name' => 'Tekst "Paberilugu" 3. kl',
    'file' => 'sheets/text_paper',
    'pages' => [ 
      1 => 1, 2 => 1, 3 => 1, 4 => 1, 
      5 => 1, 6 => 1, 7 => 1, 8 => 1, 9 => 1 
    ],
    'timelimit' => 86400,
    'alias' => 'paber'
  ],
  7 => [
    'name' => 'Tekst "Hambalugu" 2. kl',
    'file' => 'sheets/text_teeth',
    'pages' => [ 
      1 => 1, 2 => 1, 3 => 1, 4 => 1,
      5 => 5, 6 => 1, 7 => 1, 8 => 1, 9 => 1
    ],
    'timelimit' => 86400,
    'alias' => 'hambad'
  ],
  8 => [
    'name' => 'Keti õige lüli valimine',
    'file' => 'sheets/chain',
    'pages' => [
      1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1,
      6 => 1, 7 => 1, 8 => 1, 9 => 1, 10 => 1
    ],
    'timelimit' => 86400,
    'alias' => 'kett'
  ],
  9 => [
    'name' => 'Pildi õige tüki valimine',
    'file' => 'sheets/raven',
    'pages' => [
      1 => 8, 2 => 8, 3 => 8, 4 => 8, 5 => 8,
      6 => 8, 7 => 8, 8 => 8, 9 => 8,
      10 => 8, 11 => 8, 12 => 8
    ],
    'timelimit' => 86400,
    'alias' => 'raven'
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

function get_poll_id($wcode, $wid)
{
  $sheet = get_sheet_from_wcode($wcode);
  $polls = $sheet->polls;
  return (int)substr($polls, ($wid - 1) * 3, 2);
}

function get_poll_count($wcode)
{
  $sheet = get_sheet_from_wcode($wcode);
  $polls = $sheet->polls;
  return strlen($polls) / 3;
}

//generate hidden fields for form page
function form_view_hidden_fields($wcode, $page, $maxp, $poll)
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
  echo elgg_view_field([
    '#type' => 'hidden',
    'name' => 'poll',
    'value' => $poll
  ]);
}

//generate buttons for form page
function form_view_buttons($wcode, $page, $maxp, $poll)
{
  if ($page > 1)
  {
    $href1 = elgg_generate_url('view:object:worksheet', [
      'wcode' => $wcode,
      'page' => $page - 1,
      'poll' => $poll
    ]);
    echo '<a href="'.$href1.'" class="elgg-button elgg-button-action" style="display:inline-block; float:left">'.ee_echo('polls:buttons:previous').'</a>';
  }

  $value = $page < $maxp 
    ? ee_echo('polls:buttons:next') 
    : ($poll < get_poll_count($wcode)
      ? ee_echo('polls:button:nextpoll')
      : ee_echo('polls:buttons:submit'));
  echo '<button value="'.'" type="submit" class="elgg-button elgg-button-submit">'.$value."</button>";
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