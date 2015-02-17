<div class="instagram">

  <span class="sub-title">ひとこと投稿</span>

  <ul class="little-post">

    <?php

    query_posts( 'showposts=20&cat=22' );

    while ( have_posts() ) : the_post();

      ?>

      <li>

        <div class="little-post-text">

          <p class="little-post-title"><?php the_title(); ?></p>

        </div>

        <div class="little-post-img"><?php the_post_thumbnail( array( 120, 120 ) ); ?></div>

        <div class="post-authors"><a
            href="<?php echo get_author_posts_url( get_the_author_ID() ) ?>"><?php userphoto_the_author_photo() ?></a>
        </div>

      </li>

    <?php endwhile; ?>

  </ul>

</div>
