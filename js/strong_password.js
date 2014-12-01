var $input  = $('#input');
var $output = $('#output');
 
$.passy.requirements.length.min = 5;


var feedback = [
    {color: '#d0a14f', text: 'weak'},
    {color: '#4fb9d0', text: 'okay'},
    {color: '#4fd098', text: 'good'},
    {color: '#2fc170', text: 'perfect!'}
];
 
// setup the passy() function on each input
$input.passy(function(strength, valid) {
  $output.text(feedback[strength].text);
  $output.css('background-color', feedback[strength].color);
});
