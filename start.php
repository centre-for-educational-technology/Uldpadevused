<?php

const worksheets = [
  [
    'name' => 'Lugemise metakognitsioon lastele',
    'pages' => [
      'universal/name',
      'lumela/lumela1', 'lumela/lumela2', 'lumela/lumela3',
      'lumela/lumela4', 'lumela/lumela5', 'lumela/lumela6',
      'lumela/lumela7'
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
    'pages' => [],
    'csvstart' => ''
  ],
  [
    'name' => 'Kuidas õppida enne sekkumist',
    'pages' => [],
    'csvstart' => ''
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
  if ($page > 0)
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