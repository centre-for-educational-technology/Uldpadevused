<?php

echo elgg_view_field([
  '#type' => 'text',
  'name' => 'wcode',
  'required' => true,
  'placeholder' => '000000',
  '#label' => 'Küsitluse # mida soovid kustutada'
]);

$submit = elgg_view_field(array(
  '#type' => 'submit',
  '#class' => 'elgg-foot',
  'value' => "Kustuta küsitlus",
));
elgg_set_form_footer($submit);