
<div class="post">

    <?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <?php if (!post_password_required()) : ?>



        <h1 class="entry-title"> <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php echo mb_substr($post->post_title, 0, 67).''; ?></a></h1>




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


</div>

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