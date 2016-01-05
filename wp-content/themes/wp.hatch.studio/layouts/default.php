<?php get_header(); ?>

<div id="container"><!-- CONTAINER -->
<?php include(TEMPLATEPATH.'/components/_navbar.php'); ?>

  <div id="contents"><!-- CENTER -->

    <div id="<?php echo $content_type ?>-page">


      <?php include(TEMPLATEPATH . '/contents/' . $content_type . '/_' . $content_type . '_body.php'); ?>


      </div>
      <!-- END Column -->

      <?php if ($display_related_posts) { ?>
        <div class="post-related"><?php get_yuzo_related_posts(); ?></div>
      <? } ?>

    </div>
    <!-- CONTENTS -->

    <?php get_Sidebar(); ?>

</div><!-- END container -->

<?php get_footer(); ?>