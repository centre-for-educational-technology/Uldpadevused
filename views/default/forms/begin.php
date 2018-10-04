<?php
echo elgg_view_field([
  '#type' => 'text',
  'name' => 'wcode',
  'required' => true,
  'placeholder' => '123456',
  '#label' => 'Liitumiskood',
]);

$submit = elgg_view_field(array(
  '#type' => 'submit',
  '#class' => 'elgg-foot',
  'value' => 'Alusta vastamist',
));
elgg_set_form_footer($submit);
