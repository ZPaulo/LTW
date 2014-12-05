<?php
$rep = strrchr($_SERVER['REQUEST_URI'],'/');
$uri =$_SERVER['REQUEST_URI'];
$path = str_replace($rep,"/vote_poll_body.php?poll=".$row['name'],$uri);
$url = $_SERVER['SERVER_NAME'].$path;
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shareModal" data-poll=<?php echo $row['name']; ?> data-url=<?php echo $url; ?> >Share</button>

<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="shareModalLabel">Share with anyone</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="shareLink-name" class="control-label">Link:</label>
            <input type="url" name = "url" value=<?php  echo $url; ?> >
          </div>
          <div class="form-social">
            <a href="" target="_blank" class="social_box_fb">
              <span class="icon"><i class="fa fa-facebook"></i></span>
              <span class="icon_title">Share on Facebook</span>
            </a>

            <a href="" class="social_box_google">
              <span class="icon"><i class="fa fa-google-plus"></i></span>
              <span class="icon_title">Share on Google</span>

            </a>

            <a href="" class="social_box_twitter">
              <span class="icon"><i class="fa fa-twitter"></i></span>
              <span class="icon_title">Share on Twitter</span>

            </a>

            <a href="#"id="mail" class="social_box mail">
              <span class="icon"><i class="fa fa-archive"></i></span>
              <span class="icon_title">Share by e-mail</span>
            </a>
          </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#shareModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var poll = button.data('poll')
  var url = button.data('url')
  var modal = $(this)
  modal.find('.modal-body input').val(url)
  modal.find('.modal-title').text("Share "+poll+"  with anyone!")
  $('.social_box_fb').attr("href", "https://www.facebook.com/sharer/sharer.php?u="+url);
  $('.social_box_google').attr("href", "https://plus.google.com/share?url="+url);
  $('.social_box_twitter').attr("href", "https://twitter.com/home?status="+url);
})
</script>
