$(document).ready(function() {

  $("#voteContainer div a").click(function(e) {

    var answer = $(e.target).attr("name");
    var question = $(e.target).attr("class");
    var user = $(e.target).attr("user");
    var oldVotes = $(e.target).attr("votes");
    oldVotes++;
    $(e.target).attr("votes",oldVotes);

    $.ajax({
      type: "post",
      url: "vote.php",
      data: {"answer": answer}
    }).done(function(data) {

      if(user == 1){
        $('.'+question +' a').each(function () {
          var votes = $(this).attr("votes");
          $(this).parent().children().html(votes);
          $(this).parent().animate({
            width: '+='+40*votes+'px'
          }, 500);
        });
      }

      $("a."+question).remove();
    });


    $(this).prev().html(parseInt($(this).prev().html()) + 1);
    return false;
  });
});
