<?php get_header(); ?>

<div id="container" class="default">

<?php include(TEMPLATEPATH.'/components/_navbar.php'); ?>
  <div class="header">
  <?php include(TEMPLATEPATH . '/contents/' . $content_type . '/_' . $content_type . '_header.php'); ?>
  </div>

  <div id="contents">
    <div id="<?php echo $content_type ?>-page">
    <?php include(TEMPLATEPATH . '/contents/' . $content_type . '/_' . $content_type . '_body.php'); ?>
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
    </div>
    <?php get_Sidebar(); ?>

  </div>

</div><!-- END container -->

<?php get_footer(); ?>