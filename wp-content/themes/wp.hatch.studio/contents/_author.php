<?php

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>

<?php

$author_id = $curauth->id;

?>

<div class="cate-right-text">

  <span class="sub-title">Author</span>

  <a href="<?php echo get_author_posts_url($author_id) ?>">

    <img src="/wp-content/uploads/userphoto/<?php echo $author_id ?>.jpg">

  </a>

  <h3><?php echo get_the_author_meta('first_name', $author_id); ?></h3>

  <p class="big-title"><?php echo get_the_author_meta('description', $author_id); ?></p>

</div>

<div class="clear-both"></div>

</div><!-- END HEADER -->

</div>

<div id="Column">

  <ul class="pickup">

    <?php

    query_posts("showposts=30&author=$author_id&cat=-22");

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

          </a></div>

        <div class="pickup-text">

          <h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>

          <div class="pickup-paragraph">

            <p class="post-text"><a href="<?php the_permalink() ?>"
                                    rel="bookmark"><?php echo mb_substr(strip_tags($post->post_content), 0, 130) . '...'; ?>
            </p>

          </div>

          <div class="clear-both"></div>

          <div class="mini-info">

            <span class="sub-title"><?php echo time_ago(); ?></span>

            <span class="category-name">カテゴリ：<?php the_category(', '); ?></span>

          </div>

          <div class="pickup-authors"><a
              href="<?php echo get_author_posts_url(get_the_author_ID()) ?>"><?php userphoto_the_author_photo() ?></a>
          </div>
          </a>

        </div>

        <div class="clear-both"></div>

      </li>

    <?php endwhile; ?>

  </ul>