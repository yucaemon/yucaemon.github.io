<div id="side-bar-1"><!--RIGHT SIDE -->
  <?php global $site_name; ?>
  <?php include(TEMPLATEPATH.'/components/_popular_posts.php'); ?>
  <?php include(TEMPLATEPATH.'/components/sidebar/_' . $site_name[get_current_blog_id()] . '.php'); ?>
  <?php include(TEMPLATEPATH.'/components/_pickup_posts.php'); ?>
  <?php include(TEMPLATEPATH.'/components/_socialMedia.php'); ?>
</div>