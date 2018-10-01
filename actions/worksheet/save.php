<?php
//get data from form
$sheet_type = get_input('sheet_type');
$start_date = get_input('start_date');
$start_time = get_input('start_time');
$time_limit = get_input('time_limit');

//set up new object
$worksheet = new ElggObject();

$worksheet->title = $sheet_type;
$worksheet->wdate = $start_date;
$worksheet->wtime = $start_time;
$worksheet->limit = $time_limit;

$worksheet->wcode = mt_rand(100000, 999999);
$worksheet->state = "Algamas"; //"Algamas", "Alanud", "Lõppenud"
$worksheet->subtype = 'worksheet';
$worksheet->access_id = ACCESS_PUBLIC;
$worksheet->owner_guid = elgg_get_logged_in_user_guid();

$blog_guid = $worksheet->save();

if ($blog_guid) {
   system_message("Küsitlus salvestati.");
   forward($worksheet->getURL());
}
else {
   register_error("Küsitlust ei saanud teha.");
   forward(REFERER);
}