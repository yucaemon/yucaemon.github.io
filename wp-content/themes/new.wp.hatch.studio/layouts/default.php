<?php get_header(); ?>

<div id="container"><!-- CONTAINER -->

<?php include(TEMPLATEPATH.'/components/_navbar.php'); ?>
  <div class="header"><!-- HEADER -->
  <?php include(TEMPLATEPATH . '/contents/' . $content_type . '/_' . $content_type . '_header.php'); ?>
  </div><!-- END HEADER -->

  <div id="contents">
    <div id="<?php echo $content_type ?>-page">
    <?php include(TEMPLATEPATH . '/contents/' . $content_type . '/_' . $content_type . '_body.php'); ?>
    </div>
    <?php get_Sidebar(); ?>

      <?php if ($display_related_posts) { ?>
        <div class="post-related"><?php get_yuzo_related_posts(); ?></div>
      <? } ?>
  </div>

</div><!-- END container -->

<?php get_footer(); ?>