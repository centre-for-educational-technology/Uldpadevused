<?php

const ERROR = "hello there old chum";

function uldpadevused_init() {
  //visiteeri http://localhost:8888/cron/minute et esile kutsuda
  
  elgg_register_plugin_hook_handler('cron', 'minute', function() {
    //siia läheb kood mis kõiki töötavaid küsimustikke ageib ühe võrra
    //sama käib ka küsimustike kohta mis pole veel alanud
    //age 0 küsimustikud on vaja muuta arhiveeritud küsimustikeks vms vaatab
 });
}

return function() {
  elgg_register_event_handler('init', 'system', 'uldpadevused_init');
};