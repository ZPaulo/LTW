$(document).ready(function() {


$("section #question").parent().each(function () {
  var mWidth =598;
  var max = 0;
  $(this).children().next().each(function () {

    if($(this).attr("voted")=="y"){
      var votes = parseInt($(this).children().children().html());
      if(votes > max){
        max = votes;
      }
    }
  });
  $(this).children().next().each(function () {
    if($(this).attr("voted")=="y"){
      var votes = parseInt($(this).children().children().html());

      $(this).children().animate({
        width: '+='+(votes*(mWidth-50)/max)+'px'
      }, 500);

      $(this).children().next().css("margin","0px 100px");
    }
  });

});


  $("#voteInfo a").click(function(e) {

    var answer = $(e.target).attr("name");
    var question = $(e.target).attr("class");
    var oldVotes = $(e.target).attr("votes");
    var user = $(e.target).attr("user");

    var mWidth = $("#j3").width();
    oldVotes++;
    $(e.target).attr("votes",oldVotes);



    $.ajax({
      type: "post",
      url: "vote.php",
      data: {"answer": answer}
    }).done(function(data) {

      if(user == 1){
      var max = 0;
        $('.'+question +' a').each(function () {
          var votes = parseInt($(this).attr("votes"));
          if(votes > max){
            max = votes;
          }
        });

        $('.'+question +' a').each(function () {
          var votes = parseInt($(this).attr("votes"));
          $(this).parent().parent().children().children().html(votes);
          $(this).parent().parent().children().animate({
            width: '+='+(votes*(mWidth-50)/max)+'px'
          }, 500);
        });
}
      $("a."+question).remove();
    });


    $(this).prev().html(parseInt($(this).prev().html()) + 1);
    return false;
  });
});
