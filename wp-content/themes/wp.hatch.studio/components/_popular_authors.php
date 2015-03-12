
<?php global $content_type ?>

<?php if( $content_type != 'authors' ){ ?>
<div class="title-icon"><span class="sub-title">Authors</span></div>

<ul class="Authors-list">

  <?php

  $last_month = date('Y-m-d', strtotime('-2 months'));
  $results = $wpdb->get_results("
                    SELECT posts.post_author, meta.meta_value FROM $wpdb->postmeta as meta
                    join $wpdb->posts as posts on posts.ID = meta.post_id
                    WHERE meta.meta_key = 'views'
                    AND posts.post_status = 'publish'
                    AND posts.post_type = 'post'
                    AND posts.post_author in (22,5,20,18,14,24,8,7,6,33,34,35,26,37,38,39,41,12)
                    AND posts.post_date > '$last_month';
                    ", ARRAY_N);

  $post_count = array();
  $views = array();
  foreach ($results as $result) {
    $post_count[$result[0]] = $post_count[$result[0]] + 1;
    $views[$result[0]] = $views[$result[0]] + $result[1];
  }

  $average_views = array();

  foreach ($views as $key => $value) {
    $average_views[$key] = round($value / $post_count[$key]);
  }

  arsort( $average_views );

  $ordered_author_ids = array_keys( $average_views )
  ?>

  <?php foreach ( array_slice( $ordered_author_ids, 0, 5 ) as $this_author_index => $this_author_id ) {
      $this_authors_views = $average_views[$this_author_id];
    ?>

    <li>

      <a href="<?php echo get_author_posts_url($this_author_id)?>"><img src="/wp-content/uploads/userphoto/<?php echo $this_author_id ?>.thumbnail.jpg"></a>

      <dl>

        <dt>
          <a href="<?php echo get_author_posts_url($this_author_id)?>"><?php echo get_the_author_meta( 'first_name', $this_author_id ); ?></a>
          / <?php echo $this_authors_views ?>
        </dt>

        <dd>

          <a href="<?php echo get_author_posts_url($this_author_id)?>"><?php echo get_the_author_meta( 'description', $this_author_id ); ?></a>
        </dd>

      </dl>

    </li>

  <?php } ?>

</ul>

<?php } ?>