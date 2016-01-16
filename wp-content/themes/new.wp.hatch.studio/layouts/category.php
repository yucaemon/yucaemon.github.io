
<div id="container" class="single"><!-- CONTAINER -->
    <?php get_header(); ?>
    <?php include(TEMPLATEPATH.'/components/_navbar.php'); ?>

    <div id="contents"><!-- CENTER -->

        <div id="<?php echo $content_type ?>-page">

            <div class="header"><!-- HEADER -->

                <?php include(TEMPLATEPATH . '/contents/' . $content_type . '/_' . $content_type . '_header.php'); ?>

            </div><!-- END HEADER -->

            <?php include(TEMPLATEPATH . '/contents/' . $content_type . '/_' . $content_type . '_body.php'); ?>


        </div>
        <!-- END Column -->

        <?php if ($display_related_posts) { ?>
        <div class="post-related"><?php get_yuzo_related_posts(); ?></div>
        <? } ?>

    </div>
    <!-- CONTENTS -->

    <?php get_Sidebar(); ?>

</div><!-- END container -->

<?php get_footer(); ?>