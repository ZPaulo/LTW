$(document).ready(function() {
  var max_fields      = 10;
  var max_fields_q      = 5;
  var wrapper         = $("#add_answer");
  var add_button      = $("#addAns0");
  var add_button_q      = $("#addQue");


  var y = 0; //initial text box count
  var x = [];
  $(add_button_q).click(function(e){
    e.preventDefault();
    y++;
    if(y < max_fields_q){
      add_button_q.before('<div id = "question'+y+'">Question '+y+'<input type="text" name = "question'+y+'"><br><div id="add_answer'+y+'"><div id= "ans">Answer <input type="text" name = "q'+y+'answer0"></li> <br></div><div id= "ans">Answer <input type="text" name = "q'+y+'answer1"></li> <br></div><input type = "button" name ="addAns" id = "addAns'+y+'" value = "Add"></div></div>');

      x[y] = 2;
      $("#addAns"+y).off('click').click(function(e){
        e.preventDefault();
        var quest = ($(e.target).attr("id")).charAt(6);
        if(x[quest] < max_fields){
          $(e.target).before('<div id = ans>Answer <input type="text" name = "q'+quest+'answer'+x[quest]+'"><a href="#" class="remove_field" id = "'+quest+'">Remove</a><br></div>');
          x[quest]++;
        }

        $(".remove_field").off('click').click(function(e){
          e.preventDefault(); var quest = $(e.target).attr("id"); $(e.target).parent().remove();
          x[quest]--;
          for(var i = 2; i < x[quest]; i++) {
          $("#add_answer"+quest+" #ans input").eq(i).attr("name", "q" + quest + "answer" + i);
          }
        });
      });


    }
  });

  x[0] = 2;
  add_button.click(function(e){
    e.preventDefault();
    if(x[0] < max_fields){
      add_button.before('<div id = ans>Answer <input type="text" name = "q0answer'+x[0]+'"><a href="#" class="remove_field">Remove</a><br></div>');
      x[0]++;
    }

    $(".remove_field").off('click').click(function(e){
      alert("cenas");
      e.preventDefault(); $(this).parent().remove();
      x[0]--;
      for(var i = 2; i < x[0]; i++) {
        $("#add_answer0 #ans input").eq(i).attr("name", "q" + 0 + "answer" + i);
      }
    });


  });
});
