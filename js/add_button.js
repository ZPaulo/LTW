$(document).ready(function() {
  var max_fields      = 10;
  var wrapper         = $("#add_answer ul");
  var add_button      = $("#addAns");

  var x = 2; //initial text box count
  $(add_button).click(function(e){
    e.preventDefault();
    if(x < max_fields){
      wrapper.append('<div><li>Answer <input type="text" name = "answer'+x+'"><a href="#" class="remove_field">Remove</a></li> <br></div>');
      x++;
    }
  });

  wrapper.on("click",".remove_field", function(e){
    e.preventDefault(); $(this).parent().parent().remove();
    x--;
    for(var i = 2; i < x; i++) {
      $("div li input").eq(i).attr("name", "answer"+i);
    }
  })
});
