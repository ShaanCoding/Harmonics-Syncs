// to-do
// add OOP

function SendSwipe(_userid, _targetid, _swiped, callback) {
  contact_api(
    {
      m: 3,
      userid: _userid,
      targetid: _targetid,
      swiped: _swiped
    },
    callback
  );
}

$(document).ready(function () {
  
  let sce_max = $("#sce_max").val();
  let localid = $("#sce_local").val();
  let current_swipe = 1;

  $(".buddy").on("swiperight", function () {

    let targetid = $(this).attr('href');

    var i;
    for (i = 1; i < sce_max; i++) {
      var widget1 = SC.Widget("sce_" + i);
      widget1.pause();
    }

    if ($(this).is(':last-child')) {
      // $('.buddy:nth-child(1)').removeClass('rotate-left rotate-right').fadeIn(300);

    } else {

      current_swipe += 1;
      $(this).addClass('rotate-left').delay(700).fadeOut(1);
      $('.buddy').find('.status').remove();
      $(this).append('<div class="status like">Like!</div>');

      SendSwipe(localid, targetid, 1, function (data, status) {
        if (status == 'success') {
          if (data == "match") {
            alert("You have been matched!");
          }
        }
        else {
          alert(status)
        }
      });

      $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
    }
  });

  $(".buddy").on("swipeleft", function () {

    let targetid = $(this).attr('href');

    var i;
    for (i = 1; i < sce_max; i++) {
      var widget1 = SC.Widget("sce_" + i);
      widget1.pause();
    }

    if ($(this).is(':last-child')) {
      // $('.buddy:nth-child(1)').removeClass('rotate-left rotate-right').fadeIn(300);

    } else {

      current_swipe += 1;
      $(this).addClass('rotate-right').delay(700).fadeOut(1);
      $('.buddy').find('.status').remove();
      $(this).append('<div class="status dislike">Dislike!</div>');


      SendSwipe(localid, targetid, 0, function (data, status) {
        if (status == 'success') {
          if (data == "match") {
            alert("You have been matched!");
          }
        }
        else {
          alert(status)
        }
      });


      $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
    }
  });

  // add buttion functionality
  $("#cross").click(function () {



    var i;
    for (i = 1; i < sce_max; i++) {
      var widget1 = SC.Widget("sce_" + i);
      widget1.pause();
    }

    let cur_body = $("#buddy_" + current_swipe);

    let targetid = cur_body.attr('href');

    if (!cur_body.is(':last-child')) {

      current_swipe += 1;

      cur_body.addClass('rotate-right').delay(700).fadeOut(1);
      cur_body.find('.status').remove();
      cur_body.append('<div class="status dislike">Dislike!</div>');

      SendSwipe(localid, targetid, 0, function (data, status) {
        if (status == 'success') {
          if (data == "match") {
            alert("You have been matched!");
          }
        }
        else {
          alert(status)
        }
      });

      cur_body.next().removeClass('rotate-left rotate-right').fadeIn(400);
    }

  });

  $("#heart").click(function () {

    var i;
    for (i = 1; i < sce_max; i++) {
      var widget1 = SC.Widget("sce_" + i);
      widget1.pause();
    }

    let cur_body = $("#buddy_" + current_swipe);

    let targetid = cur_body.attr('href');


    if (!cur_body.is(':last-child')) {

      current_swipe += 1;

      cur_body.addClass('rotate-left').delay(700).fadeOut(1);
      cur_body.find('.status').remove();
      cur_body.append('<div class="status like">Like!</div>');

      SendSwipe(localid, targetid, 1, function (data, status) {
        if (status == 'success') {
          if (data == "match") {
            alert("You have been matched!");
          }
        }
        else {
          alert(status)
        }
      });

      cur_body.next().removeClass('rotate-left rotate-right').fadeIn(400);
    }

  });

});