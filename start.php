<?php

const worksheets = [
  [
    'name' => 'Lugemise metakognitsioon lastele',
    'pages' => [1 => 'ws1-bussid', 2 => 'ws1-emakeel']
  ],
  [
    'name' => 'Lugmot-laused 4klass',
    'pages' => []
  ],
  [
    'name' => 'Kuidas õppida enne sekkumist',
    'pages' => []
  ]
];

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

//adds 1 reply to sheet
function increase_sheet_replies($sheet)
{
  $replies = $sheet->replies;
  $replies = strval(intval($replies) + 1);
  $sheet->replies = $replies;
  $sheet->save();
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
  if ($page > 1)
  {
    $href1 = elgg_generate_url('view:object:worksheet', [
      'wcode' => $wcode,
      'page' => $page - 1
    ]);
    echo '<a href="'.$href1.'" class="elgg-button elgg-button-action">Eelmine küsimus</a>';
  }
  if ($page < $maxp)
  {
    $submit = elgg_view_field(array(
    '#type' => 'submit',
    '#class' => 'elgg-foot',
    'value' => 'Järgmine küsimus'
    ));
  }
  else {
    $submit = elgg_view_field(array(
      '#type' => 'submit',
      '#class' => 'elgg-foot',
      'value' => 'Saada ära',
    ));
  }
  elgg_set_form_footer($submit);
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