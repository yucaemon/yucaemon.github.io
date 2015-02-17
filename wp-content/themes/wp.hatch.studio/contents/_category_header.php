<?php $target_cat = get_category_by_slug($category_name) ?>

<?php $cat_id = $target_cat->term_id; ?>
<div class="category-header">
  <div class="cate-img-top">
    <img src="<?php echo get_template_directory_uri(); ?>/images/big_categories_img/T-<?php echo $cat_id ?>.png">
  </div>
  <div class="cate-right-text">
    <?php
    $category = get_category($cat_id);
    ?>
    <h2><?php echo $category->slug ?></h2>
    <p class="big-title"><?php echo $category->name ?></p>
  </div>

</div>