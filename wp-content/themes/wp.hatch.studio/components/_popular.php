<div class="title-icon"><span class="sub-title">popular</span></div>

<ul class="popular">

  <?php

  query_posts('showposts=10&cat=19');

  while(have_posts()) : the_post();

    ?>

    <li>

      <div class="popular-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(60,60)); ?></a></div>

      <div class="popular-text">

        <p class ="popular-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

        <!-- p class="popular-paraglah"><?php echo substr(strip_tags($post-> post_content), 0, 200);?></p -->

      </div>

      <div class="clear-both"></div>

    </li>

  <?php endwhile; ?>

</ul>
