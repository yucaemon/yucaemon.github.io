<ul class="popular">

  <div class="side-title">POPULAR POSTS</div>

  <?php

  query_posts('showposts=10&cat=19');

  while(have_posts()) : the_post();

    ?>

    <li>



      <span class="name"><?php the_author_nickname(); ?></span><span class="views"> - <?php if (function_exists('the_views')) { the_views(); } ?></span>


      <div class="popular-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(60,60)); ?></a></div>

      <div class="popular-text"><div class ="popular-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>


          <!-- p class="popular-paraglah"><?php echo substr(strip_tags($post-> post_content), 0, 200);?></p -->

      </div>

      <div class="clear-both"></div>

    </li>

  <?php endwhile; ?>

</ul>
