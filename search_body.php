<?php include_once("templates/header.php") ?>

<script type="text/javascript" src="js/search.js"></script>


 <div class="container">
      <ul class="nav">
        <li class="dropdown-list">
          <a class="dropdown" id="dropdown">
           <div id="search_data_div">Search:
           	<input id="searchData" type="text">
           </div>
          </a>
            <ul class="dropdown-menu">
              <div id = "results">

              </div>
            </ul>
      </li>
    </ul>
</div>



<script type="text/javascript">
  $(document).ready(function() {
 $('.dropdown').on('keyup focus select search','#searchData', function() {
 	 var button = $(event.relatedTarget);
 	 var idP = button.data('idpoll');
 	 $('#dropdown').attr('data-toggle', 'dropdown');
 });
});
</script>

