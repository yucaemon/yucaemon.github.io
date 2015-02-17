<?php

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>

<?php

$author_id = $curauth->id;

?>

<div>

  <span class="sub-title">Author</span>

  <a href="<?php echo get_author_posts_url($author_id) ?>">

    <img class="author-header" src="/wp-content/uploads/userphoto/<?php echo $author_id ?>.jpg">

  </a>

  <h2><?php echo get_the_author_meta('first_name', $author_id); ?></h2>

  <p class="big-title"><?php echo get_the_author_meta('description', $author_id); ?></p>

</div>

