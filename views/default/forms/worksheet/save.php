<?php

//validates date in dd-mm-yyyy format, also accounts for leap years
$regex_date = '(^(((0[1-9]|1[0-9]|2[0-8])[-](0[1-9]|1[012]))|((29|30|31)[-](0[13578]|1[02]))|((29|30)[-](0[4,6,9]|11)))[-](19|[2-9][0-9])\d\d$)|(^29[-]02[-](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)';

//validates time in hh:mm format.
$regex_time = '^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$';

$today = date_create("today", timezone_open('Europe/Tallinn'))->format('d-m-Y');

$user = elgg_get_logged_in_user_entity();
$school = $user->school;
$grade = $user->grade;

$l = count(ws_order);
for ($i = 0; $i < $l; $i += 1)
{
  $optval[ws_order[$i]] = worksheets[ws_order[$i]]['name'];
}
echo elgg_view_field([
  '#type' => 'checkboxes',
  'name' => 'sheets',
  'options_values' => $optval,
  '#label' => ee_echo('polls:forms:worksheets')
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'start_date',
  'required' => true,
  'placeholder' => 'pp-kk-aaaa',
  'pattern' => $regex_date,
  '#label' => ee_echo('polls:forms:starttime'),
  'value' => $today
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'school',
  'required' => true,
  '#label' => ee_echo('polls:forms:school'),
  'value' => $school
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'grade',
  'required' => true,
  '#label' => ee_echo('polls:forms:grade'),
  'value' => $grade
]);

$submit = elgg_view_field(array(
  '#type' => 'submit',
  '#class' => 'elgg-foot',
  'value' => ee_echo('polls:forms:create'),
));
elgg_set_form_footer($submit);
