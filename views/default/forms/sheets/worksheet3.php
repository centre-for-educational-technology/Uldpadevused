<?php
echo elgg_view_field([
  '#type' => 'hidden',
  'name' => 'wcode',
  'value' => elgg_extract('wcode', $vars)
]);

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'test',
  'required' => false
]);

$submit = elgg_view_field(array(
  '#type' => 'submit',
  '#class' => 'elgg-foot',
  'value' => 'Saada ära',
));
elgg_set_form_footer($submit);