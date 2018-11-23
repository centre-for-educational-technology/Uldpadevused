<?php
elgg_ajax_gatekeeper();

//get img data url
$img = get_input('img');

//upload img to database and return url


//return url
echo json_encode([
  'imgUrl' => "google.com"
]);

return true;