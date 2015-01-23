<div id="author-list">

    <div class="page-title">記者一覧</div>

    <ul>

        <?php

  // 表示する順番にユーザーIDを設定する

  $this_authors = array(22,5,20,18,14,24,8,7,6,33,34,35,26,37,38,39,41,12);

  ?>

        <?php foreach ($this_authors as $this_author_id ) { ?>

        <li>
            <a href="<?php echo get_author_posts_url($this_author_id)?>">
                <img src="/wp-content/uploads/userphoto/<?php echo $this_author_id ?>.thumbnail.jpg">
            </a>
            <dl>

                <dt>
                    <a href="<?php echo get_author_posts_url($this_author_id)?>">
                      <span class="name"><?php echo get_the_author_meta( 'first_name', $this_author_id ); ?> </span>
                    </a>
                      <span class="position">| キュレーター</span>
                      <span class="since-date">
                    since
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
                    </span>
                </dt>

                <dd>
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
                    <a href="<?php echo get_author_posts_url($this_author_id)?>"><?php echo get_the_author_meta( 'description', $this_author_id ); ?></a>
                </dd>

            </dl>

            <div class="clear-both"></div>

        </li>

        <?php } ?>

    </ul>

</div>