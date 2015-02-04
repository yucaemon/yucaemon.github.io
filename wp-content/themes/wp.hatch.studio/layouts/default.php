<?php get_header(); ?>

<?php get_Sidebar(); ?>


  <div id="center"><!-- CENTER -->

    <div id="<?php echo $content_type ?>-page">

      <div id="header"><!-- HEADER -->

        <div class="title"><!-- TITLE -->
          <h1>S<span class="first-a">a</span>n Fr<span
                class="second-a">a</span>n<span class="c">c</span>isco</h1>

          <h2>現地密着まがじん。</h2>
        </div>
        <?php include(TEMPLATEPATH . '/contents/_' . $content_type . '_header.php'); ?>

      </div><!-- END HEADER -->

      <?php include(TEMPLATEPATH . '/contents/_' . $content_type . '_body.php'); ?>

      <div class="clear-both"></div>

      <?php if ($display_pagenavi && function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
      </div>
      <!-- END Column -->

      <?php if ($display_related_posts) { ?>
        <div class="post-related"><?php get_yuzo_related_posts(); ?></div>
      <? } ?>

    </div>
    <!-- CENTER -->

    <?php get_Sidebar(2); ?>

  </div><!-- END contents -->

  <div class="clear-both"></div>

</div><!-- END container -->

</div>

<?php get_footer(); ?>