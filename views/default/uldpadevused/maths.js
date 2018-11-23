define(function(require) {
  var DrawingBoard = require("uldpadevused/drawingboard");
    var $ = require("jquery");
  var Ajax = require("elgg/Ajax");
  var ajax = new Ajax();

  var myBoard = new DrawingBoard.Board('zbeubeu');

  $('a[id=fakesubmit]').on("click", function(event) {
    var img = myBoard.getImg();
    var imgInput = (myBoard.blankCanvas == img) ? '' : img;

    //use ajax to submit imgImput and get back link to put to q2

    ajax.action('send_maths', {
      data: {
        img: imgInput
      }
    }).done(function(output, statusText, jqXHR) {
      if (jqXHR.AjaxData.status == -1) {
        return;
      };
      $('input[name=q2]').val(output.imgUrl);
      //console.log(output.imgUrl);
    });

    $('button[type=submit]').click();
    return false;
  });
});