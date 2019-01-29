define(function(require) {
  var $ = require("jquery");

  var questionCount = 2;
  var optionCount = 4;

  var last = new Array(questionCount);
  
  for (var i = 1; i <= questionCount; i += 1)
  {
    var name1 = 'input[name=q'+i.toString()+']';
    
    var element = $(name1+':checked').parent();
    element.addClass("selected");
    last[i] = element;

    for (var k = 1; k <= optionCount; k += 1)
    {
      (function(i, k) {
        var name2 = name1+'[value="'+k.toString()+'"]';

        $(name2).on("change", function() {
          var element = $(name2).parent();

          element.addClass("selected");

          if (last[i]) {
            last[i].removeClass("selected");
          }

          last[i] = element;
        });
      })(i, k);
    }
  }
});