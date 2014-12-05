

<button type="button" class="btn btn-primary" data-idpoll= <?php echo $row['idPoll']; ?> data-private = <?php echo $row['private']; ?> data-poll= <?php echo $row['name']; ?> data-toggle="modal" data-target="#manageModal" >Manage</button>

<div class="modal fade" id="manageModal" tabindex="-1" role="dialog" aria-labelledby="manageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="manageModalLabel">Manage Poll</h4>
      </div>
      <div class="modal-body">
         <form class="form-signin" action="manage_poll.php" method ="post" role="form">
          <input type="hidden" id="idPoll" name="idPoll" value="">
        Poll Name<input type="text" id="inputUser" name="name" class="form-control" placeholder="" >
        Private <input type="checkbox" id = "private" name="private" class="form-control" value="private" >
        Image<input type="file" id="fileToUpload" name="fileToUpload" class="form-control"  >
        <button type="submit" id="button" class="btn btn-primary">CHANGE</button>
        <a  href="=" id="button" class="delete">DELETE</a>
      </form>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#manageModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var poll = button.data('poll')
  var priv = button.data('private')
  var modal = $(this)
  var idP = button.data('idpoll')
  $('.delete').attr('href',"delete.php?idPoll="+idP);
  $('#idPoll').attr('value', idP);
  $('#inputUser').attr('placeholder', poll);
  if(priv == 1){
    $('#private').attr('checked','checked');
  }
  else{
     $('#private').removeAttr('checked');
  }


})
</script>


