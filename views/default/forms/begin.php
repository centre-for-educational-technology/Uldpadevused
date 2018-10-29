<?php
echo elgg_view_field([
  '#type' => 'text',
  'name' => 'wcode',
  'required' => true,
  'placeholder' => '123456',
  '#label' => ee_echo('polls:forms:code')
]);
echo elgg_view_field([
  '#label' => ee_echo('polls:forms:name'),
  '#type' => 'text',
  'name' => 'name',
  'required' => true
]);
echo elgg_view_field([
  '#label' => ee_echo('polls:forms:gender'),
  '#type' => 'select',
  'options_values' => array(
    ee_echo('polls:forms:gender:male') => ee_echo('polls:forms:gender:male'),
    ee_echo('polls:forms:gender:female') => ee_echo('polls:forms:gender:female')
  ),
  'name' => 'gender',
  'required' => true
]);
echo elgg_view_field([
  '#label' => ee_echo('polls:forms:age'),
  '#type' => 'dropdown',
  'options_values' => array(
    '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11',
    '12' => '12', '13' => '13', '14' => '14', '15' => '15'
  ),
  'name' => 'age',
  'required' => true
]);

$submit = elgg_view_field(array(
  '#type' => 'submit',
  '#class' => 'elgg-foot',
  'value' => ee_echo('polls:forms:begin'),
));
elgg_set_form_footer($submit);
