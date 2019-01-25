define(function(require) {
  var $ = require("jquery");
  var last;
  
  //for expandability later
  for (var i = 1; i <= 1; i += 1)
  {
    for (var k = 1; k <= 4; k += 1)
    {
      (function(i, k) {
        var name = 'input[name=q'+i.toString()+'][value="'+k.toString()+'"]';
        $(name).on("change", function() {
          var element = $(name).parent();

          element.addClass("selected");

          if (last) {
            last.removeClass("selected");
          }

          last = element;
        });
      })(i, k);
    }
  }
});