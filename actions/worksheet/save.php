<?php
gatekeeper();

//get data from form
$sheetids = get_input('sheets');

if (!$sheetids)
{
  register_error(ee_echo('polls:error:noneselected'));
  forward(REFERER);
}

//convert array to string and also check if client didnt
//send us wrong data
$n = count($sheetids);
$p = count(worksheets);
for ($i = 0; $i < $n; $i += 1)
{
  $si = $sheetids[$i];
  if ($si < 0 || $si > $p)
  {
    register_error(ee_echo('polls:error:wrongid'));
  }
  $digit = strval($si);

  //pad with a 0 to allow for ids 1-99 to work
  if (strlen($digit) == 1) $digit = '0'.$digit;

  $polls .= $digit;
  $polls .= ",";
}

//the title will just be the first poll
$title = worksheets[$sheetids[0]]['name'];

if (!$title)
{
  register_error(ee_echo('polls:error:wrongid'));
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

//store author name to make it easier to find your own polls
$author = elgg_get_logged_in_user_entity()->name;

//if its today then the poll will be already started by default
$state = $u1 == $u2 ? "Alanud" : "Algamas";

//calculate end time to make checking for ended questionnaires easier
$date3 = clone $date1;
$date3->modify('+1 Day');
$end_time = $date3->format($format);

//set up new object
$worksheet = new ElggObject();

$worksheet->title = $title;
$worksheet->wdate = $start_date;
$worksheet->wtend = $end_time;
$worksheet->grade = $grade;
$worksheet->school = $school;
$worksheet->author = $author;
$worksheet->polls = $polls;

//"Algamas, "Alanud, "Lõppenud" - Starting, Started, Ended
$worksheet->state = $state;

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
$csv = '"Kool","Klass","Nimi","Sugu","Vanus"';
for ($s = 0; $s < $n; $s += 1)
{
  $stype = $sheetids[$s];

  //get page count
  $pcount = count(worksheets[$stype]['pages']);

  //if its timelimited worksheet, we can ignore the first page
  //and the other pages numbers are one higher than they should be, so
  //we start scanning from second page and subtract one in csv entries
  $l = (worksheets[$stype]['timelimit']) ? 1 : 0;

  for ($i = 1 + $l; $i <= $pcount; $i += 1)
  {
    //get question count
    $qcount = worksheets[$stype]['pages'][$i];
  
    for ($k = 1; $k <= $qcount; $k += 1)
    {
      $csv .= ',"'.worksheets[$stype]['alias'].': '.($i - $l).'.'.$k.'"';
    }
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