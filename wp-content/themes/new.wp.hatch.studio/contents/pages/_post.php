<div class="post">

    <?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>"
    <?php post_class(); ?>>

    <header class="entry-header">

        <?php if (!post_password_required()) : ?>

        <h1 class="entry-title"><a title="<?php the_title(); ?>"
                                   href="<?php the_permalink() ?>"><?php echo mb_substr($post->post_title, 0, 67).'';
            ?></a></h1>

        <div class ="post-sub-informations">
            <div class="sns-icons">
              <span class="twitter-share-botn">
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
              </span>

                <?php if (!is_user_logged_in()) : ?>
                <span class="facebook-like-btn">
                <iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=650457541700749"
                        scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;"
                        allowTransparency="true"></iframe>
                </span>
                <?php endif; ?>

                <a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?>" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

　　　　　　　</div>


            <div class="views">
              <span class="count">
              <?php echo post_custom('views'); ?>
               </span>
              <span class="count-text">
                VIEWS
               </span>
            </div>

            </div>

            <div class="category-name">CATEGORIES：<?php $cat = get_the_category(); $cat = $cat[0]; {
$cat_slug = $cat->slug;
                echo  $cat_slug;
                } ?>
            </div>







        <div class="entry-thumbnail">

            <?php

            if (has_post_thumbnail()) :

              the_post_thumbnail('full');

            else :

              ?>

            <img src="<?php echo get_template_directory_uri(); ?>/images/NoImg.png"
                 class="attachment-post-thumbnail">

            <?php

            endif;

            ?>

        </div>

        <div class="sub-text-content">
            <div class="author-photo">
                <a href="<?php echo get_author_posts_url(get_the_author_ID()) ?>">
                    <?php userphoto_the_author_photo() ?>
                </a>
            </div>
            <p class="author-nickname"><?php the_author_nickname(); ?></p>
            <span class="time"><i class="fa fa-clock-o"></i><?php echo the_date(" M.d.Y - h:s a"); ?></span>


        </div>

        <?php endif; ?>

    </header>
    <!-- .entry-header -->

    <div class="entry-content">

        <?php the_content(); ?>
        <div class="sns-icons">
              <span class="twitter-share-botn">
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
              </span>

            <?php if (!is_user_logged_in()) : ?>
                <span class="facebook-like-btn">
                <iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=650457541700749"
                        scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;"
                        allowTransparency="true"></iframe>
                </span>
            <?php endif; ?>

            <a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?>" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

            　　　　　　　</div>

    </div>
    <!-- .entry-content -->

    </article><!-- #post -->

    <?php endwhile; ?>


    <div class="authors-content">
        <div class="author-photo">
            <a href="<?php echo get_author_posts_url(get_the_author_ID()) ?>">
                <?php userphoto_the_author_photo() ?>
            </a>
        </div>
        <div class="author-excerpt">
            <p class="author-nickname"><?php the_author_nickname(); ?></p>

            <p class="author-description"><?php the_author_description(); ?></p>
        </div>
    </div>
    <!-- 四角はっち公告 -->
    <div class="google-ad-index">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:inline-block;width:336px;height:280px"
             data-ad-client="ca-pub-1574488309106788"
             data-ad-slot="5136876359"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <!-- 広告 -->

    <ul class="articles">

        <?php query_posts('showposts=6');

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


        <div class="mini-info">
            <p class="sub-title"><?php echo time_ago(); ?></p>
        </div>

        </li>

        <?php endwhile; endif;
  wp_reset_query(); ?>
    </ul>

</div>

