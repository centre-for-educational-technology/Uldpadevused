<?php

gatekeeper();

//get data from form
$sheet_type = worksheets[get_input('sheet_type')]['name'];
$start_date = get_input('start_date');
$start_time = get_input('start_time');
$time_limit = get_input('time_limit');
$school = get_input('school');
$grade = get_input('grade');

//validate date&time - can't be in the past
$format = 'd-m-Y H:i';
$tallinn = timezone_open('Europe/Tallinn');

$date1 = date_create_from_format($format, $start_date.' '.$start_time, $tallinn);
$date2 = date_create("now", $tallinn);

$u1 = date_timestamp_get($date1);
$u2 = date_timestamp_get($date2);

if ($u1 < $u2)
{
  //date is in the past so don't create worksheet
  register_error(ee_echo('polls:error:pasttime'));
  forward(REFERER);
}

//calculate end time to make checking for ended questionnaires easier
$date3 = clone $date1;
$time = explode(":",$time_limit);
$minutes = intval($time[0])*60 + intval($time[1]);
$date3->modify('+'.$minutes.' Minute');
$end_time = $date3->format($format);
$limit = strval($minutes * 60);

//set up new object
$worksheet = new ElggObject();

$worksheet->title = $sheet_type;
$worksheet->wdate = $start_date;
$worksheet->wtime = $start_time;
$worksheet->limit = $limit;
$worksheet->wtend = $end_time;
$worksheet->grade = $grade;
$worksheet->school = $school;

$worksheet->state = "Algamas"; //"Algamas", "Alanud", "Lõppenud"
$worksheet->subtype = 'worksheet';
$worksheet->access_id = ACCESS_PUBLIC;
$worksheet->owner_guid = elgg_get_logged_in_user_guid();

//generate random unique code. rarely creates 7 or more digit codes.
$min = 100000;
$max = 999999;
$try = 0;
do {
  $wcode = mt_rand($min, $max);
  $sheets = elgg_get_entities(array(
    'metadata_names' => array('wcode'),
    'metadata_values' => array($wcode)
  ));

  if ($try > 2)
  {
    $try = 0;
    $min *= 10;
    $max = $max * 10 + 9;
  }
  else
  {
    $try += 1;
  }
} while (count($sheets) > 0);
$worksheet->wcode = $wcode;

//set table names for csv text
$key = array_search($sheet_type, array_column(worksheets, 'name'));
$csv = worksheets[$key]['csvstart'];
$worksheet->csv = $csv;

$blog_guid = $worksheet->save();

if ($blog_guid) {
  system_message(ee_echo('polls:success:saved'));

  //forward to same page but also display code of created worksheet
  $url = elgg_generate_url('add:object:worksheet', [
    'wcode' => $worksheet->wcode
  ]);
  forward($url);
}
else {
  register_error(ee_echo('polls:error:fail'));
  forward(REFERER);
}