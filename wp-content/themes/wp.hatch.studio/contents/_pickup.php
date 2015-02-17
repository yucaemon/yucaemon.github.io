

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

          <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
          <p class="post-text">
            <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo mb_substr(strip_tags($post->post_content), 0, 130) . '...'; ?>
          </p>

          <div class="mini-info">
            <span class="sub-title"><?php echo time_ago(); ?></span>
            <span class="category-name">カテゴリ：<?php the_category(', '); ?></span>
          </div>

          <div class="pickup-authors">
            <a href="<?php echo get_author_posts_url(get_the_author_ID()) ?>"><?php userphoto_the_author_photo() ?></a>
          </div>

        </div>

      </li>

    <?php endwhile; ?>

  </ul>