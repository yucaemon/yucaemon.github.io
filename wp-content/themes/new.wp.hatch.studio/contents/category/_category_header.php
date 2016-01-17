<?php $target_cat = get_category_by_slug($category_name) ?>

<?php $cat_id = $target_cat->term_id; ?>
<div class="category-header">

  <div class="category-name-box">
    <?php
    $category = get_category($cat_id);
    ?>
    <h2 class="category-name-slug"><?php echo $category->slug ?></h2>
    <p class="category-name-japanese"><?php echo $category->name ?></p>
  </div>

</div>