define(function(require) {
  var Ajax = require("elgg/Ajax");
  var $ = require("jquery");
  var elgg = require("elgg");
  var ajax = new Ajax();

  $('input[name=q1]').on("change", function(event) {
    /*ajax.action('send_reading', {
      data: {
        wcode: $('input[name=wcode]').val(),
        page: $('input[name=page]').val(),
        value: $('input[name=q]:checked').val()
      }
    }).done(function (output, statusText, jqXHR) {
      if (jqXHR.AjaxData.status == -1) {
        return;
      };
    });*/
    $('button[type=submit]').click();
  });
});