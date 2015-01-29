<div class="author-page">
    <div class="page-title">記者一覧</div>
    <ul>
        <?php
        // 表示する順番にユーザーIDを設定する
        $this_authors = array(22,5,20,18,14,24,8,7,6,33,34,35,26,37,38,39,41,12);
        ?>
        <?php foreach ($this_authors as $this_author_id ) { ?>
        <li>

                <a href="<?php echo get_author_posts_url($this_author_id)?>"><img src="/wp-content/uploads/userphoto/<?php echo $this_author_id ?>.thumbnail.jpg"></a>


            <dl>
                <dt>

                    <a href="<?php echo get_author_posts_url($this_author_id)?>"><span class="name"><?php echo get_the_author_meta( 'first_name', $this_author_id ); ?></span></a>
                    <span class="delimiter">|</span>
                      <span class="position">キュレーター<?php
                     $job = get_the_author_meta( 'job', $this_author_id );
                    if ( $job ) :
                        echo "兼".$job;
                    endif;

                    ?></span>

                  <span class="author-social-icons">
                    <?php
                        $facebook = get_the_author_meta( 'facebook', $this_author_id );
                        $facebookLink = '';
                        if ( $facebook ) :
                            $facebookLink = '<a class="facebook" href="'. $facebook .'" target="_blank" title="Twitter"><span class="fa-stack"><i class="fa fa-facebook-square"></i></span></a>';
                    endif;
                    echo $facebookLink;
                    ?>

                      <?php
                        $twitter = get_the_author_meta( 'twitter', $this_author_id );
                        $twitterLink = '';
                        if ( $twitter ) :
                            $twitterLink = '<a class="twitter" href="' . $twitter .'" target="_blank" title="Twitter"><span class="fa-stack"><i class="fa fa-twitter-square"></i></span></a>';
                    endif;
                    echo $twitterLink;
                    ?>

                      <?php
                        $instagram = get_the_author_meta( 'instagram', $this_author_id );
                        $instagramLink = '';
                        if ( $instagram ) :
                            $instagramLink = '<a class="instagram" href="' . $instagram .'" target="_blank" title="Twitter"><span class="fa-stack"><i class="fa fa-instagram"></i></span></a>';
                    endif;
                    echo $instagramLink;
                    ?>

                      <?php
                        $pinterest = get_the_author_meta( 'pinterest', $this_author_id );
                        $pinterestLink = '';
                        if ( $pinterest ) :
                            $pinterestLink = '<a class="pinterest" href="' . $pinterest .'" target="_blank" title="pinterest"><span class="fa-stack"><i class="fa fa-pinterest"></i></span></a>';
                    endif;
                    echo $pinterestLink;
                    ?>

                      <?php
                        $user_url = get_the_author_meta( 'user_url', $this_author_id );
                        $user_urlLink = '';
                        if ( $user_url ) :
                            $user_urlLink = '<a class="user_url" href="' . $user_url .'" target="_blank" title="user_url"><span class="fa-stack"><i class="fa fa-home"></i></span></a>';
                    endif;
                    echo $user_urlLink;
                    ?>

                  </span>

                </dt>

                <dd>

                    <p class="introduction">
                        <?php echo get_the_author_meta( 'description', $this_author_id ); ?>
                    </p>
                    <div class="post-account">
                        <?php
                 $result = (int) $wpdb->get_var("
                        SELECT COUNT(*) FROM $wpdb->posts
                        WHERE post_type = 'post'
                        AND post_status = 'publish'
                        AND post_author = $this_author_id
                        ");
                        echo $result;
                        ?> post
                    </div>
                    <div class="since-date">
                        Join:
                        <?php
                 $result =  $wpdb->get_var("
                        SELECT post_date FROM $wpdb->posts
                        WHERE post_type = 'post'
                        AND post_status = 'publish'
                        AND post_author = $this_author_id
                        order by post_date
                        limit 1
                        ");
                        $dtime = new DateTime($result);
                        echo $dtime->format('Y-m-d');
                        ?>
                    </div>



                </dd>

            </dl>

            <div class="clear-both"></div>

        </li>

        <?php } ?>

    </ul>

</div>