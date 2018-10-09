<?php

$wcode = get_input('wcode');
$sheet = get_sheet_from_wcode($wcode);
if (!$sheet) return;

//increase number of replies by 1
increase_sheet_replies($sheet);