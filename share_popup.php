<input type="button" id="modal_trigger" href="#modal"  value="Share">

 <div id="modal" class="popupContainer" style="display:none;">
    <header class="popupHeader">
      <span class="header_title">Share with Friends</span>
      <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
      <!-- Social  -->
      <div class="social_login">
        <div class="">
            <input type="url" name = "url" value=<?php  $rep = strrchr($_SERVER['REQUEST_URI'],'/'); $uri =$_SERVER['REQUEST_URI'];  $path = str_replace($rep,"/vote_poll_body.php?poll=".$row['name'],$uri); echo $url = $_SERVER['SERVER_NAME'].$path; ?> >

            <a href=<?php echo "https://www.facebook.com/sharer/sharer.php?u=".$url; ?> target="_blank" class="social_box fb">
            <span class="icon"><i class="fa fa-facebook"></i></span>
            <span class="icon_title">Share on Facebook</span>
          </a>

          <a href="#" class="social_box google">
            <span class="icon"><i class="fa fa-google-plus"></i></span>
            <span class="icon_title">Share on Google</span>
          </a>

          <a href="#"id="mail" class="social_box mail">
            <span class="icon"><i class="fa fa-archive"></i></span>
            <span class="icon_title">Share by e-mail</span>
          </a>
        </div>
      </div>
    </section>
  </div>

<script type="text/javascript">

  $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });


  $(function(){
    // Calling Login Form
    $("#mail").click(function(){
      $(".social_login").hide();
      return false;
    });

  })
</script>
