<?php get_header(); ?>
<?php get_Sidebar(); ?>
<div id="center"><!-- CENTER -->
  <?php include(TEMPLATEPATH.'/contents/_'.$content_type.'.php'); ?>
</div><!--END CENTER -->

<?php get_Sidebar(2); ?>

</div><!-- END contents -->
<div class="clear-both"></div>
</div><!-- END container -->

</div>

<?php get_footer(); ?>

