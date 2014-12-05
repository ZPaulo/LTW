$(document).ready(function(){

  $('#results').html('<p style="padding:5px;">Enter a search term to start filtering.</p>');

  $('#searchData').on('keyup focus', function() {

    var searchVal = $(this).val();
    if(searchVal !== '') {

      $.get('./search.php?searchData='+searchVal, function(returnData) {
        if (!returnData) {
          $('#results').html('<p style="padding:5px;">Search term entered does not return any data.</p>');
        } else {
          $('#results').html(returnData);
        }
      });
    } else {
      $('#results').html('<p style="padding:5px;">Enter a search term to start filtering.</p>');
    }

  });

});
