<?php include_once('templates/header.php'); ?>

<script type="text/javascript">
 $(window).load(function(){
  $('#helpModal').modal('show');
 });
 </script>

<div class="modal fade" id="helpModal" tabindex="1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h1 class="modal-title" id="helpModalLabel">HELP</h1>
      </div>
      <div class="modal-body">
		<div class="jumbotron" id="j7">
			<div class="container">
 			 <p>You can view a list of all public polls in the home page</p>
 			 <p>To vote on a poll simply click a link from that list or search for the poll's name on the search bar</p>
 			 <p>You must be logged in to view the results of a poll</p>
 			 <p>You can only view the results of a poll after you vote on it (you must be logged in)</p>
 			 <p>On your profile page you can manage and share your polls</p>
 			</div> <!-- /container -->
		</div>
      </div>
 	<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
     
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once('templates/footer.php'); ?>