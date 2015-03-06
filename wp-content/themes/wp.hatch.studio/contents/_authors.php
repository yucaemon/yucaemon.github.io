<?php include(TEMPLATEPATH.'/components/_about.php'); ?>

<?php
$site_leader_id = $site_leader[ get_current_blog_id() ];
$last_month = date('Y-m-d', strtotime('-6 months'));
$results = $wpdb->get_results("
SELECT count(post_author), post_author, max(post_date), min(post_date)
FROM $wpdb->posts WHERE post_type = 'post' and post_status = 'publish'
and post_author not in( 1, 22, $site_leader_id )
group by post_author
having max(post_date) > '$last_month'
order by count(post_author) desc;
", ARRAY_N);
?>
<?php
$leaders = $wpdb->get_results("
SELECT count(post_author), post_author, max(post_date), min(post_date)
FROM $wpdb->posts WHERE post_type = 'post' and post_status = 'publish'
and post_author in ( $site_leader_id )
group by post_author
having max(post_date) > '$last_month'
order by count(post_author) desc;
", ARRAY_N);
array_unshift( $results, $leaders[0] )
?>

<div class="authors">
    <ul>
        <?php foreach ($results as $result ) {
          $this_author_id = $result[1];
          $post_counts = $result[0];
          $last_updated_date = $result[2];
          $joined_date = $result[3];
        ?>
        <!--?php foreach ($this_authors as $this_author_id ) { ?-->
        <li><?php echo $this_user_id ?>

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
                        echo $post_counts;
                        ?> post
                    </div>
                    <div class="since-date">
                        Join:
                        <?php
                        $dtime = new DateTime($joined_date);
                        echo $dtime->format('Y-m-d');
                        ?>
                    </div>
                </dd>
            </dl>
        </li>

        <?php } ?>

    </ul>

</div>