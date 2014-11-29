$(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper         = $("#add_answer ul"); //Fields wrapper
  var add_button      = $("#addAns"); //Add button ID

  var x = 3; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      wrapper.append('<li>Answer ' + x +':<input type="text" name = "answer'+x+'"><a href="#" class="remove_field">Remove</a></li> <br>'); //add input box
    }
  });

  wrapper.on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('li').remove(); x--;
  })
});
