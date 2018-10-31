define(function(require) {
  var Ajax = require("elgg/Ajax");
  var $ = require("jquery");
  var elgg = require("elgg");
  var ajax = new Ajax();

  for (var i = 1; i <= 6; i += 1)
  {
    //go through function to get rid of reference and use value instead
    (function (i) {
      $('input[name=q'+i.toString()+']').on("change", function(event) {
        ajax.action('send_metacognition', {
          data: {
            wcode: $('input[name=wcode]').val(),
            page: $('input[name=page]').val(),
            id: i.toString(),
            value: $('input[name=q'+i.toString()+']:checked').val()
          },
        }).done(function (output, statusText, jqXHR) {
          if (jqXHR.AjaxData.status == -1) {
              return;
          };
        });
      });
    })(i);
  };
});