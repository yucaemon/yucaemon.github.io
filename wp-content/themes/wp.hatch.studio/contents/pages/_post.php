
<div class="post">

  <?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <header class="entry-header">

        <?php if (!post_password_required()) : ?>

          <div class="mini-info">

            <span class="sub-title"><?php echo time_ago(); ?></span>

                    <span class="views"><?php if (function_exists('the_views')) {
                        the_views();
                      } ?></span>

            <span class="category-name">カテゴリ：<?php the_category(', '); ?>　タグ：<?php the_tags('', ', '); ?></span>

          </div>

          <a href="<?php echo home_url(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>

          <div class="api-share-btns">

            <?php if (!is_user_logged_in()) : ?>

              <div class="facebook-like-btn">

                <iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=650457541700749"
                        scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;"
                        allowTransparency="true"></iframe>

              </div>

            <?php endif; ?>

            <div class="twitter-share-botn">

              <a href="https://twitter.com/share" class="twitter-share-button"
                 data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" 　
                 data-via="hatchstudioinc" data-lang="ja" data-hashtags="海外おもしろまがじん" data-dnt="true">ツイート</a>

              <script>!function (d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                  if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = p + '://platform.twitter.com/widgets.js';
                    fjs.parentNode.insertBefore(js, fjs);
                  }
                }(document, 'script', 'twitter-wjs');</script>

            </div>

          </div>

          <div class="entry-thumbnail">

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

          </div>

          <div class="authors-info">
            <div class="pickup-authors">
              <a href="<?php echo get_author_posts_url(get_the_author_ID()) ?>">
                <?php userphoto_the_author_photo() ?>
              </a>
            </div>

            <p class="name"><?php the_author_nickname(); ?></p>

            <p class="author-about"><?php the_author_description(); ?></p>

          </div>

        <?php endif; ?>

      </header>
      <!-- .entry-header -->

      <div class="entry-content">

        <?php the_content(); ?>

      </div>
      <!-- .entry-content -->

    </article><!-- #post -->

  <?php endwhile; ?>

</div>

<?php if (!is_user_logged_in()) : ?>

  <!--div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="10"></div-->

<?php endif; ?>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- はっち広告ーレスポンシブ -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1574488309106788"
     data-ad-slot="7838417156"
     data-ad-format="auto"></ins>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<div class="post-related"><?php get_yuzo_related_posts(); ?></div>