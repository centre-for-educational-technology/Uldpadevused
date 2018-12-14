define(function(require) {
  var $ = require("jquery");

  for (var i = 1; i <= 3; i += 1)
  {
    (function(i) {
      $('input[name=q'+i.toString()+']').on("input", function(event) {
        $('input[name=q'+i.toString()+']').each(function() {
          this.setCustomValidity('');
        });
      });
    })(i);
  }
});