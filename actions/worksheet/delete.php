<?php
elgg_admin_gatekeeper();
$wcode = get_input('wcode');

$worksheet = get_sheet_from_wcode($wcode);

if ($worksheet)
{
  $worksheet->delete();
  system_message("Küsitlus kustutatud.");
}

$url = elgg_generate_url('collection:object:worksheet:all', []);
forward($url);