<?php query_posts("showposts=15&author=$author_id&posts_per_page=1&paged=" . $paged); ?>
<?php include(TEMPLATEPATH . '/contents/_post_summary.php'); ?>
