define(function(require) {
  var DrawingBoard = require("uldpadevused/drawingboard");
  var $ = require("jquery");
  var Ajax = require("elgg/Ajax");
  var ajax = new Ajax();

  var imgid = 'img' + $('input[name=wcode]').val() + $('input[name=page]').val();

  var myBoard = new DrawingBoard.Board(imgid);

  $('form').on("submit", function(event) {
    event.preventDefault();
    var self = this;

    var img = myBoard.getImg();
    var imgInput = (myBoard.blankCanvas == img) ? '' : img;

    if (!$('input[name=q1').val()) $('input[name=q1]').val('0');

    ajax.action('send_maths', {
      data: {
        img: imgInput,
        wcode: $('input[name=wcode]').val(),
        poll: $('input[name=poll]').val(),
        page: $('input[name=page]').val()
      }
    }).done(function(output, statusText, jqXHR) {
      if (jqXHR.AjaxData.status == -1) {
        return;
      };
      $('input[name=q2]').val(output.imgUrl);
      self.submit();
    });
  });

  $('input[id=dontknow]').on('change', function(event) {
    $('input[name=q1]').prop("required", !this.checked);
  });
});