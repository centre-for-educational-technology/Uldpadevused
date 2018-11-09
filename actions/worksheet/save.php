<?php
gatekeeper();

//get data from form
$stype = get_input('sheet_type');
$title = worksheets[$stype]['name'];

//if client sends illegal number we detect it >:(
if (!$title)
{
  register_error("sellist küsitlust pole");
  forward(REFERER);
}

$start_date = get_input('start_date');
$school = get_input('school');
$grade = get_input('grade');

//save school and grade to remember it later - user convenience
$user = elgg_get_logged_in_user_entity();
$user->school = $school;
$user->grade = $grade;

//validate date - can't be in the past
$format = 'd-m-Y';
$tallinn = timezone_open('Europe/Tallinn');

$date1 = date_create_from_format($format.' h:i:s', $start_date.' 00:00:00', $tallinn);
$date2 = date_create("today", $tallinn);

$u1 = date_timestamp_get($date1);
$u2 = date_timestamp_get($date2);
if ($u1 < $u2)
{
  //date is in the past so don't create worksheet
  register_error(ee_echo('polls:error:pasttime'));
  forward(REFERER);
}
$state = $u1 == $u2 ? "Alanud" : "Algamas";

//calculate end time to make checking for ended questionnaires easier
$date3 = clone $date1;
$date3->modify('+1 Day');
$end_time = $date3->format($format);

//small time limit if its the reading task
if ($stype == 2)
{
  $limit = 60;
}
else
{
  $limit = 86400; //seconds in a day
}

//set up new object
$worksheet = new ElggObject();

$worksheet->title = $title;
$worksheet->stype = $stype;
$worksheet->wdate = $start_date;
$worksheet->limit = $limit;
$worksheet->wtend = $end_time;
$worksheet->grade = $grade;
$worksheet->school = $school;

$worksheet->state = $state; //"Algamas", "Alanud", "Lõppenud"
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

//make first csv line with column names
$csv = '"Nimi","Sugu","Vanus"';

//get page count
$pcount = count(worksheets[$stype]['pages']);

for ($i = 1; $i <= $pcount; $i += 1)
{
  //get question count
  $qcount = worksheets[$stype]['pages'][$i];

  for ($k = 1; $k <= $qcount; $k += 1)
  {
    $csv .= ',"'.$i.'.'.$k.'"';
  }
}
$csv .= "\n";

//write csv
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