<?php $target_cat = get_category_by_slug($category_name) ?>

<?php $cat_id = $target_cat->term_id; ?>

<div class="cate-img-top cook-img-top"><img
    src="<?php echo get_template_directory_uri(); ?>/images/cates/T-<?php echo $cat_id ?>.png"></div>

<div class="cate-right-text img-cook">

  <span class="sub-title">category</span>

  <?php

  $category = get_category($cat_id);

  ?>

  <h3><?php echo $category->slug ?></h3>

  <p class="big-title"><?php echo $category->name ?></p>

  <p class="small-title"><?php echo $category->description ?></p>

</div>

<div class="clear-both"></div>