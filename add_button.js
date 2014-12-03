$(document).ready(function() {
  var max_fields      = 10;
  var wrapper         = $("#add_answer ul");
  var add_button      = $("#addAns");

  var x = 3; //initlal text box count
  $(add_button).click(function(e){
    e.preventDefault();
    if(x < max_fields){
      x++;
      wrapper.append('<li>Answer ' + x +':<input type="text" name = "answer'+x+'"><a href="#" class="remove_field">Remove</a></li> <br>');
    }
  });

  wrapper.on("click",".remove_field", function(e){
    e.preventDefault(); $(this).parent('li').remove(); x--;
  })
});
