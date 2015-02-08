<?php $target_cat = get_category_by_slug($category_name) ?>

<?php $cat_id = $target_cat->term_id; ?>

<div class="cate-img-top cook-img-top"><img
    src="<?php echo get_template_directory_uri(); ?>/images/big_categories_img/T-<?php echo $cat_id ?>.png"></div>

<div class="category-header">
  <?php
  $category = get_category($cat_id);
?>
  <h3><?php echo $category->slug ?></h3>

<div class="category-title">
  <p class="big-title"><?php echo $category->name ?></p>
  <p class="small-title"><?php echo $category->description ?></p>
</div>

</div>

<div class="clear-both"></div>
