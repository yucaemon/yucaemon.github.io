<div class="single-post">
  <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <!-- .entry-content -->
    </article><!-- #post -->
  <?php endwhile; ?>
</div>

