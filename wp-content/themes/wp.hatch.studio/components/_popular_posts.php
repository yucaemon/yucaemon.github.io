<div class="side-title">POPULAR POSTS</div>
<ul class="popular">

  <?php

  $last_month = date('Y-m-d', strtotime('-2 months'));
  $results = $wpdb->get_results("
                    SELECT posts.ID, meta.meta_value FROM $wpdb->postmeta as meta
                    join $wpdb->posts as posts on posts.ID = meta.post_id
                    WHERE meta.meta_key = 'views'
                    AND posts.post_status = 'publish'
                    AND posts.post_author in (22,5,20,18,14,24,8,7,6,33,34,35,26,37,38,39,41,12)
                    AND posts.post_date > '$last_month';
                    ", ARRAY_N);

  $average_views = array();

  foreach ($results as $result) {
    $average_views[$result[0]] = $result[1];
  }

  arsort( $average_views );

  $view_ordered_post_ids = array_keys( $average_views )
  ?>

  <?php foreach ( array_slice( $view_ordered_post_ids, 0, 10 ) as $this_post_index => $this_post_id ) {
       $this_post_views = $average_views[$this_post_id];
       $this_post = get_post( $this_post_id );
  ?>

    <li>

      <div class="popular-header">
        <span class="author"><?php echo the_author_meta( 'nickname', $this_post->post_author ); ?> </span><span class="views"> - <?php echo $this_post_views ?>views</span>
        <span class ="title"><a href="<?php echo get_permalink($this_post->ID); ?>"><?php echo $this_post->post_title; ?></a></span>
      </div>
      <a href="<?php echo get_permalink($this_post->ID); ?>"><?php echo get_the_post_thumbnail( $this_post->ID, 'thumbnail' ); ?></a>

    </li>

  <?php } ?>

</ul>
