<?php get_header(); ?>



<?php get_sidebar(); ?>





<div id="middle"><!-- ------------------------------------------------------------------------ MIDDLE -->





<div class="font-seven"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></div>



<p class="post-time"><?php the_date(); ?> time :<?php the_time(); ?></p>

<p class="singlethimbnail"><?php the_content(); ?></p>



</div><!-- ------------------------------------------------------------------------------- END MIDDLE -->





<?php get_footer(); ?>