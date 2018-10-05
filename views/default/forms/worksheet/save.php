<?php

//validates date in dd-mm-yyyy format, also accounts for leap years
$regex_date = '(^(((0[1-9]|1[0-9]|2[0-8])[-](0[1-9]|1[012]))|((29|30|31)[-](0[13578]|1[02]))|((29|30)[-](0[4,6,9]|11)))[-](19|[2-9][0-9])\d\d$)|(^29[-]02[-](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)';

//validates time in hh:mm format.
$regex_time = '^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$';

echo elgg_view_field([
  '#type' => 'select',
  'name' => 'sheet_type',
  'required' => true,
  'options_values' => array(
    worksheet1 => worksheet1,
    worksheet2 => worksheet2,
    worksheet3 => worksheet3,
  ),
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'start_date',
  'required' => true,
  'placeholder' => 'pp-kk-aaaa',
  'pattern' => $regex_date,
  '#label' => 'Algusaeg',
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'start_time',
  'required' => true,
  'placeholder' => 'hh:mm',
  'pattern' => $regex_time,
  '#label' => 'Algusaeg',
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'time_limit',
  'required' => true,
  '#label' => 'Ajalimiit',
  'placeholder' => 'hh:mm',
  'pattern' => $regex_time,
]);

$submit = elgg_view_field(array(
  '#type' => 'submit',
  '#class' => 'elgg-foot',
  'value' => 'Genereeri kood',
));
elgg_set_form_footer($submit);
