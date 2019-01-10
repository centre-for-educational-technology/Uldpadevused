define(function(require) {
  var DrawingBoard = require("uldpadevused/drawingboard");
  var $ = require("jquery");
  var Ajax = require("elgg/Ajax");
  var ajax = new Ajax();

  var imgid = 'img' + $('input[name=wcode]').val() + $('input[name=page]').val();

  var myBoard = new DrawingBoard.Board(imgid);

  $('form').on("submit", function(event) {
    var img = myBoard.getImg();
    var imgInput = (myBoard.blankCanvas == img) ? '' : img;

    if ($('input[name=q1]').val())
      var q1 = $('input[name=q1]').val();
    else
      var q1 = 0;

    ajax.action('send_maths', {
      data: {
        img: imgInput,
        q1: q1,
        sesid: $('input[name=sessionid]').val(),
        wcode: $('input[name=wcode]').val(),
        poll: $('input[name=poll]').val(),
        page: $('input[name=page]').val()
      }
    }).done(function(output, statusText, jqXHR) {
      if (jqXHR.AjaxData.status == -1) {
        return;
      };
    });
  });

  $('input[id=dontknow]').on('change', function(event) {
    $('input[name=q1]').prop("required", !this.checked);
  });
});