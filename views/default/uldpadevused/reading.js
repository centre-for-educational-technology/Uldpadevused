define(function(require) {
  var Ajax = require("elgg/Ajax");
  var $ = require("jquery");
  var elgg = require("elgg");
  var ajax = new Ajax();

  $('input[name=q1]').on("change", function(event) {
    $('button[type=submit]').click();
  });
});