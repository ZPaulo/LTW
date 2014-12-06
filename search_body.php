<?php include_once("templates/header.php") ?>

<script type="text/javascript" src="js/search.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
 $('.dropdown').on('keyup focus select search','#searchData', function() {
 	 var button = $(event.relatedTarget);
 	 var idP = button.data('idpoll');
 	 $('#dropdown').attr('data-toggle', 'dropdown');
 });
});
</script>

