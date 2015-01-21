
<div class="title-icon"><span class="sub-title">Authors</span></div>

<ul class="Authors-list">

  <?php

  // 表示する順番にユーザーIDを設定する

  $this_authors = array(22,5,20,18,14,23,24,8,7,6,32,33, 34,12);

  ?>

  <?php foreach ($this_authors as $this_author_id ) { ?>

    <li>

      <a href="<?php echo get_author_posts_url($this_author_id)?>"><img src="/wp-content/uploads/userphoto/<?php echo $this_author_id ?>.thumbnail.jpg"></a>

      <dl>

        <dt><a href="<?php echo get_author_posts_url($this_author_id)?>"><?php echo get_the_author_meta( 'first_name', $this_author_id ); ?></a></dt>

        <dd><a href="<?php echo get_author_posts_url($this_author_id)?>"><?php echo get_the_author_meta( 'description', $this_author_id ); ?></a></dd>

      </dl>

      <div class="clear-both"></div>

    </li>

  <?php } ?>

</ul>