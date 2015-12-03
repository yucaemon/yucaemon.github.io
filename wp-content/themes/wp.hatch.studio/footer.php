<!-- footer -->

<div id="footer">

<div id ="footer-content">

<?php if (!preg_match('~Windows|MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT'])) : ?>

<ul class ="icons">

<li><a href="https://www.facebook.com/hatchsudioinc?fref=ts" target="_blank"><span class='symbol'></span></a></li>

<li><a href="https://twitter.com/hatchstudioinc" target="_blank"><span class='symbol'></span></a></li>

<li><a href="" target="_blank"><span class='symbol'></span></a></li>

<li><a href="" target="_blank"><span class='symbol'></span></a></li>

<li><a href="http://www.meetup.com/JapaneseMeetupBerkeley/" target="_blank"><span class='symbol'></span></a></li>

<li><a href="" target="_blank"><span class='symbol'></span></a></li>

</ul>

<?php endif; ?>
    <div class="fb-page" data-href="https://www.facebook.com/hatchstudioinc/?ref=hl" data-width="472px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/hatchstudioinc/?ref=hl"><a href="https://www.facebook.com/hatchstudioinc/?ref=hl">はっちすたじお</a></blockquote></div></div>

<p><small>hatchstudio All Rights Reserved.</small></p>















</div>







</div>







<?php wp_footer(); ?>





<?php if (is_user_logged_in()) : ?>

<style type="text/css">

.navbar { top: 28px !important; }

</style>

<?php endif; ?>




<script>

$(function(){
  $(".dropdown-menu").each(function(){
    var parentWidth = $(this).parent().innerWidth();
    var menuWidth = $(this).innerWidth();
    var margin = (parentWidth / 2 ) - (menuWidth / 2);
    margin = margin + "px";
    $(this).css("margin-left", margin);
  });
});
</script>




</body>







</html>