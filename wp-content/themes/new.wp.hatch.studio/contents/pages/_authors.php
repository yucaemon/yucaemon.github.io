<?php include(TEMPLATEPATH.'/components/_about.php'); ?>

<?php
$site_leader_id = $site_leader[ get_current_blog_id() ];
$results = $wpdb->get_results("
SELECT count(post_author), post_author, max(post_date), min(post_date)
FROM $wpdb->posts WHERE post_type = 'post' and post_status = 'publish'
and post_author not in( 1, 22, $site_leader_id )
group by post_author
order by count(post_author) desc;
", ARRAY_N);
?>
<?php
$leaders = $wpdb->get_results("
SELECT count(post_author), post_author, max(post_date), min(post_date)
FROM $wpdb->posts WHERE post_type = 'post' and post_status = 'publish'
and post_author in ( $site_leader_id )
group by post_author
order by count(post_author) desc;
", ARRAY_N);
array_unshift( $results, $leaders[0] )
?>

<?php
// 現役/OB 表示をしたい場合は、ここにSiteIDを入れてください
// ユーザーの設定で「ステータス」が「ob」になっている人も表示されるようになります
//    1 => "sf",
//    6 => "ucberkeley",
//    8 => "newyork",
//    9 => 'portland'
//    11 => 'ucla'

$is_ob_display = in_array( get_current_blog_id(),  [ 6 ] );
?>
<?php

// ヘッダに表示される「現役」「卒業生」の文言を変更する場合は、下の文字列を変更してください
if( $is_ob_display ){
  $user_kinds = [ 'BERKELEYNIAN' => false, 'ALUMNI' => true ];
}else{
  $user_kinds = [ 'BERKELEYNIAN' => false ];
}

?>

<?php foreach( $user_kinds as $user_status_title => $is_ob_status ) { ?>
<div class="authors">
<?php if( $is_ob_display ){
// この下のh2が、「現役」「卒業生」のヘッダになるので、スタイルを変更する場合はこのh2を変更してください ?>
<h2><?php echo $user_status_title ?></h2>
<?php } ?>

    <ul>
        <?php foreach ($results as $result ) {
          $this_author_id = $result[1];
          $post_counts = $result[0];
          $last_updated_date = $result[2];
          $joined_date = $result[3];
          $is_ob = strtolower( get_the_author_meta( 'is_ob', $this_author_id ) ) == 'ob';
        ?>
        <?php if( $is_ob == $is_ob_status ){ ?>
        <li><?php echo $this_user_id ?>

                <a href="<?php echo get_author_posts_url($this_author_id)?>"><?php echo userphoto_thumbnail($this_author_id); ?></a>

            <dl>
                <dt>
                  <a href="<?php echo get_author_posts_url($this_author_id)?>"><span class="name"><?php echo get_the_author_meta( 'first_name', $this_author_id ); ?></span></a>
                    <span class="delimiter">|</span>
                      <span class="position">Editor <?php
                     $job = get_the_author_meta( 'job', $this_author_id );
                    if ( $job ) :
                        echo "& ".$job;
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
        <?php } ?>
    </ul>

</div>
<?php } ?>