<?php get_header(); ?>

<div id="container" class="single"><!-- CONTAINER -->

  <?php include(TEMPLATEPATH.'/components/_navbar.php'); ?>

  <div id="contents"><!-- CONTENTS -->
    <?php include(TEMPLATEPATH.'/contents/pages/_'.$content_type.'.php'); ?>

      <!-- 四角はっち公告 -->
      <div class="google-ad-index">
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <ins class="adsbygoogle"
               style="display:inline-block;width:336px;height:280px"
               data-ad-client="ca-pub-1574488309106788"
               data-ad-slot="5136876359"></ins>
          <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
      </div>
      <!-- 広告 -->

  </div><!--END CONTENTS -->

  <?php get_Sidebar(); ?>

</div><!-- END container -->

<?php get_footer(); ?>

