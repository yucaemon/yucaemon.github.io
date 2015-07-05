<ul class="pickup">

  <?php

  query_posts('showposts=12&posts_per_page=1&paged=' . $paged);

  while (have_posts()) : the_post();

    ?>

    <li>

      <div class="pickup-img"><a href="<?php the_permalink() ?>" rel="bookmark">

          <?php

          if (has_post_thumbnail()) :

            the_post_thumbnail();

          else :

            ?>

            <img src="<?php echo get_template_directory_uri(); ?>/images/NoImg.png"
                 class="attachment-post-thumbnail">

          <?php

          endif;

          ?>
        </a>
      </div>

      <div class="pickup-text">

        <h4><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php
 if(mb_strlen($post->post_title)>51) { $title= mb_substr($post->post_title,0,51) ; echo $title. ･･･ ;
            } else {echo $post->post_title;}?></a>
        </h4>

        <div class="pickup-paragraph">

          <p class="post-text"><a href="<?php the_permalink() ?>"
                                  rel="bookmark"><?php echo mb_substr(strip_tags($post->post_content), 0, 60) . '...'; ?></a>
          </p>

        </div>

        <div class="mini-info">

          <span class="sub-title"><?php echo time_ago(); ?></span>

          <span class="category-name">カテゴリ：<?php the_category(', '); ?></span>

        </div>

        <a href="<?php echo get_author_posts_url(get_the_author_ID()) ?>">
          <div class="pickup-authors"><p class="pickup-authors-name"><?php echo get_the_author_meta('first_name', $author_id); ?></p><?php userphoto_the_author_photo() ?>
          </div>

        </a>

      </div>


    </li>

  <?php endwhile; ?>

  <?php if (function_exists('wp_pagenavi')) {
    wp_pagenavi();
  } ?>

</ul>

<ul class="articles">

  <?php query_posts('showposts=16&offset=12');

  if (have_posts()) : while (have_posts()) :
    the_post(); ?>

    <li <?php if (( $wp_query->current_post +1)%4 == 0) : echo "class='article-cr'";endif ?> >

      <p class="thimbnailtop"><a href="<?php the_permalink() ?>" rel="bookmark">
          <?php

          if (has_post_thumbnail()) :

            the_post_thumbnail();

          else :

            ?>

            <img src="<?php echo get_template_directory_uri(); ?>/images/NoImg.png"
                 class="attachment-post-thumbnail">

          <?php

          endif;

          ?>
        </a>
      </p>

      <p class="post-title">
        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php

          if (mb_strlen($post->post_title) > 20) {
            $title = mb_substr($post->post_title, 0, 25);
            echo $title . '･･･';
          } else {
            echo $post->post_title;
          } ?>
        </a>
      </p>

      <p class="post-text">
        <a href="<?php the_permalink() ?>"
           rel="bookmark"><?php echo mb_substr(strip_tags($post->post_content), 0, 30) . '...'; ?></a>
      </p>

      <div class="mini-info">
        <p class="sub-title"><?php echo time_ago(); ?></p>
      </div>
    <div class="post-authors">
        <a href="<?php echo get_author_posts_url(get_the_author_ID()) ?>"><?php userphoto_the_author_photo() ?></a>
    </div>

    </li>

  <?php endwhile; endif;
  wp_reset_query(); ?>
</ul>