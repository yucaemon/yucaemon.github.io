<?php $content_type = "index" ?>
<?php $display_pagenavi = false ?>
<?php $display_related_posts = false ?>
<?php if( $_GET['version'] ){ ?>
  <?php include(TEMPLATEPATH.'/top.php'); ?>
<?php }else{ ?>
  <?php include(TEMPLATEPATH.'/layouts/default.php'); ?>
<?php } ?>