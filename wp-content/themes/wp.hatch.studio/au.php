<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="middle"><!-- ------------------------------------------------------------------------ MIDDLE -->

<img src="<?php echo get_template_directory_uri(); ?>/images/s-bnr-_au.png">

<ul class="bxslider">

<li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/bnr_us01.jpg"/></li>

<li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/bnr_us02.jpg"/></li>

<li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/bnr_us03.jpg"/></li>

<li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/bnr_au01.jpg"/></li>

<li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/bnr_au02.jpg"/></li>

<li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/bnr_jk01.jpg"/></li>

<li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/bnr_jk02.jpg"/></li>

</ul>

<div class="widget_information">

<h2><img src="<?php echo get_template_directory_uri(); ?>/images/heading_information.png" height="16" width="72" alt="最新情報"/></h2>

<div class="module_headline">

<ul>

<li><time>2013.10.06</time><span class="title">現地人に聞いた超格安語学学校情報</span></li>

<li><time>2013.08.10</time><span class="title">バークレー若者会 meet up</span></li>

<li><time>2013.07.23</time><span class="title">アメリカ人との交流会</span></li>

<li><time>2013.08.28</time><span class="title">はっちすたじおオープン</span></li>

</ul>

</div><!-- /.module_headline -->

</div><!-- /.widget_information -->

<div class="tit-house"><!-- TITTLE HOUSE -->

<dl class="tit-top">

<dt>自分で選べるホームスティ、シェアハウス</dt>

<hr>

<dd class="cate-top-text">コンセプトは、オージーと楽しく安心して生活できる家。</dd>

</dl>

</div>

<div id="house-wrap">

<div class="house-post"><!-- HOUSE LEFT -->

<?php

query_posts('showposts=10&cat=10');

while(have_posts()) : the_post();

?>

<?php the_post_thumbnail(); ?>

<dl class="house-text">

<dt class="house-text-tit"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></dt>

<!-- Hr Width="180" -->

<dd class="house-text-intro"><?php echo substr(strip_tags($post-> post_content), 0, 200);?></dd>

</dl>

<?php endwhile; ?>

</div>

<div class="house-post"><!-- HOUSE RIGHT -->

<?php

query_posts('showposts=10&cat=17');

while(have_posts()) : the_post();

?>

<?php the_post_thumbnail(); ?>

<dl class="house-text">

<dt class="house-text-tit"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></dt>

<!-- Hr Width="180" -->

<dd class="house-text-intro"><?php echo substr(strip_tags($post-> post_content), 0, 200);?></dd>

</dl>

<?php endwhile; ?>

</div>

<div class="clear-both"></div>

</div>

<div id="main-post">

<div class="tit-house"><!-- TITTLE HOUSE -->

<dl class="tit-top">

<dt>海外各地からお届け！面白ろマガジン</dt>

<hr>

<dd class="cate-top-text">みんなが欲しい海外情報を現地の人間が体験するよ！</dd>

</dl>

</div>

<?php

query_posts('showposts=10&cat=19');

while(have_posts()) : the_post();

?>

<p class="post-tit"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></p>

<p class="post-time"><?php the_date(); ?> time :<?php the_time(); ?></p>

<p class="thimbnailtop"><?php the_post_thumbnail(); ?></p>

<p class="post-text"><?php echo substr(strip_tags($post-> post_content), 0, 200);?> 

<br/><p class="more"><sub><img src="<?php echo get_template_directory_uri(); ?>/images/mark.png"></sub>続きを読む</a ></p>

<hr color="#E0F8F0" size="10px">

<?php endwhile; ?>

</div>

</div><!-- ------------------------------------------------------------------------------- END MIDDLE -->

<?php get_footer(); ?>