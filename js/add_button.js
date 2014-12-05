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
      /*add_button_q.before('<div id = "question'+y+'">Question '+y+'<input type="text" required = "required" name = "question'+y+'"><br><div id="add_answer'+y+'"><div id= "ans">Answer <input type="text" required = "required" name = "q'+y+'answer0"></li> <br></div><div id= "ans">Answer <input type="text" required = "required" name = "q'+y+'answer1"></li> <br></div><input type = "button" name ="addAns" id = "addAns'+y+'" value = "Add"></div></div>');*/
      /*<input type="text" id="question0" name="question0" class="form-control" placeholder="QUESTION" required>*/
       add_button_q.before('<div class="col-sm-20"><input type="text" id="question'+y+'" name="question'+y+'" class="form-control" placeholder="QUESTION '+y+'" required></div><div id="add_answer'+y+'" class="col-sm-20"><input type="text" id="q'+y+'answer0" name="q'+y+'answer0" class="form-control" placeholder="ANSWER 0" required> <input type="text" id="q'+y+'answer1" name="q'+y+'answer1" class="form-control" placeholder="ANSWER 1" required><input type = "button" name ="addAns'+y+'" id = "addAns'+y+'" value = "Add Answer"></div>');
      x[y] = 2;
      $("#addAns"+y).off('click').click(function(e){
        e.preventDefault();
        var quest = ($(e.target).attr("id")).charAt(6);
        if(x[quest] < max_fields){
         /* $(e.target).before('<div id = ans>Answer <input type="text" required = "required" name = "q'+quest+'answer'+x[quest]+'"><a href="#" class="remove_field" id = "'+quest+'">Remove</a><br></div>');*/
/* <input type="text" id="q0answer0" name="q0answer0" class="form-control" placeholder="ANSWER 0" required>*/
         $(e.target).before('<div id = ans><input type="text" id = "q'+quest+'answer'+x[quest]+'" name = "q'+quest+'answer'+x[quest]+'" class="form-control" placeholder="ANSWER '+x[quest]+'" required><a href="#" class="remove_field" id = "'+quest+'">Remove</a></div>');
          x[quest]++;
        }

        $(".remove_field").off('click').click(function(e){
          e.preventDefault(); var quest = $(e.target).attr("id"); $(e.target).parent().remove();
          x[quest]--;
          for(var i = 2; i < x[quest]; i++) {
          $("#add_answer"+quest+" input").eq(i).attr("name", "q" + quest + "answer" + i);
          $("#add_answer"+quest+" input").eq(i).attr("placeholder", "ANSWER " + i);
          }
        });
      });


    }
  });

  x[0] = 2;
  add_button.click(function(e){
    e.preventDefault();
    if(x[0] < max_fields){
      add_button.before('<div id = ans><input type="text" id = "q0answer'+x[0]+'" name = "q0answer'+x[0]+'" class="form-control" placeholder="ANSWER '+x[0]+'" required><a href="#" class="remove_field" id = "0">Remove</a></div>');
      x[0]++;
    }

    $(".remove_field").off('click').click(function(e){
      e.preventDefault(); $(this).parent().remove();
      x[0]--;
      for(var i = 2; i < x[0]; i++) {
        $("#add_answer0 input").eq(i).attr("name", "q"+ 0 +"answer" + i);
        $("#add_answer0 input").eq(i).attr("placeholder", "ANSWER " + i);
      }
    });


  });
});
