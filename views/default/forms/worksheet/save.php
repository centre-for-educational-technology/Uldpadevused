<?php

echo elgg_view_field([
  '#type' => 'select',
  'name' => 'sheet_type',
  'required' => true,
  'options_values' => array(
    'type01' => 'Lugemise metakognitsioon lastele',
    'type02' => 'Lugmot-laused 4klass',
    'type03' => 'Kuidas õppida enne sekkumist'
  ),
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'start_date',
  'required' => true,
  'placeholder' => 'DD/MM/YYYY',
  'pattern' => '^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)\d{2})$',
  '#label' => 'Algusaeg',
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'start_time',
  'required' => true,
  'placeholder' => 'hh:mm',
  'pattern' => '^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$',
  '#label' => 'Algusaeg',
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'time_limit',
  'required' => true,
  '#label' => 'Ajalimiit',
  'placeholder' => 'hh:mm',
  'pattern' => '^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$',
]);

$submit = elgg_view_field(array(
  '#type' => 'submit',
  '#class' => 'elgg-foot',
  'value' => 'Genereeri kood',
));
elgg_set_form_footer($submit);
