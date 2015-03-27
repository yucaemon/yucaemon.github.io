<?php query_posts("showposts=15&author=$author_id&cat=-22&posts_per_page=1&paged=" . $paged); ?>
<?php include(TEMPLATEPATH . '/contents/_pickup.php'); ?>
