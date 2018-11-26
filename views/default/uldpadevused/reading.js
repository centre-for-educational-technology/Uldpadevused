define(function(require) {
  var $ = require("jquery");

  $('input[name=q1]').on("change", function(event) {
    $('button[type=submit]').click();
  });
});