<?php get_header(); ?>



<?php get_sidebar(); ?>



<div id="middle"><!-- ------------------------------------------------------------------------ MIDDLE -->

<img src="<?php echo get_template_directory_uri(); ?>/images/s-title-design.png">

<?php

query_posts('showposts=10&cat=8');

while(have_posts()) : the_post();

?>

<div class="font-seven"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></div>

<p class="post-time"><?php the_date(); ?> time :<?php the_time(); ?></p>

<?php the_content(); ?></p>

<br/>

<hr color="#E0F8F0" size="10px">

<?php endwhile; ?>

</div><!-- ------------------------------------------------------------------------------- END MIDDLE -->

<?php get_footer(); ?>