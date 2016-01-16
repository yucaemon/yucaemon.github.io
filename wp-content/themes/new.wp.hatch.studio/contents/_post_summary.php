

  <ul class="pickup">

    <?php

    while (have_posts()) : the_post();

      ?>

      <li>

        <div class="pickup-img"><a href="<?php the_permalink() ?>" rel="bookmark">

            <?php

            if (has_post_thumbnail()) :

              the_post_thumbnail();

            else :

              ?>

              <img src="<?php echo get_template_directory_uri(); ?>/images/NoImg.png" class="attachment-post-thumbnail">

            <?php

            endif;

            ?>

          </a>
        </div>

        <div class="pickup-text">
            <div class="mini-info">
                <span class="time-ago"><?php echo time_ago(); ?></span>
            </div>
          <h3><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php
 if(mb_strlen($post->post_title)>51) { $title= mb_substr($post->post_title,0,51) ; echo $title. ･･･ ;
              } else {echo $post->post_title;}?></a></h3>
          <p class="post-text">
            <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo mb_substr(strip_tags($post->post_content), 0, 90) . '...'; ?> </a>
          </p>


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