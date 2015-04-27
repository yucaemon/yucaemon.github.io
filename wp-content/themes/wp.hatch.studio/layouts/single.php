<?php get_header(); ?>

<div id="container"><!-- CONTAINER -->

  <?php include(TEMPLATEPATH.'/components/_navbar.php'); ?>

  <div id="contents"><!-- CONTENTS -->
    <?php include(TEMPLATEPATH.'/contents/pages/_'.$content_type.'.php'); ?>
  </div><!--END CONTENTS -->

  <?php get_Sidebar(); ?>

</div><!-- END container -->

<?php get_footer(); ?>

