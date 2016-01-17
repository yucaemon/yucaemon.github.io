<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<?php
$author_id = $curauth->id;
?>
<div class="author-header">

        <div class="author-profile-photo">
            <a href="<?php echo get_author_posts_url($author_id) ?>">
                <?php userphoto_the_author_photo('','',array('class' => 'author-header'),'') ?>
            </a>
        </div>
        <h2 class="author-profile-name"><?php echo get_the_author_meta('first_name', $author_id); ?></h2>

        <p class="author-profile-description"><?php echo get_the_author_meta('description', $author_id); ?></p>


</div>