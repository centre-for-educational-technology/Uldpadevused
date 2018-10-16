<?php
echo elgg_view_field([
  '#type' => 'text',
  'name' => 'wcode',
  'required' => true,
  'placeholder' => '123456',
  '#label' => 'Liitumiskood'
]);
echo elgg_view_field([
  '#label' => 'Ees- ja perekonnanimi',
  '#type' => 'text',
  'name' => 'name',
  'required' => true
]);
echo elgg_view_field([
  '#label' => 'Sugu',
  '#type' => 'select',
  'options_values' => array(
    'mees' => 'Mees',
    'naine' => 'Naine'
  ),
  'name' => 'gender',
  'required' => true
]);
echo elgg_view_field([
  '#label' => 'Vanus',
  '#type' => 'dropdown',
  'options_values' => array(
    '7' => '7', '8' => '8', '9' => '9', '10' => '10',
    '11' => '11', '12' => '12', '13' => '13', '14' => '14'
  ),
  'name' => 'age',
  'required' => true
]);

$submit = elgg_view_field(array(
  '#type' => 'submit',
  '#class' => 'elgg-foot',
  'value' => 'Alusta vastamist',
));
elgg_set_form_footer($submit);
