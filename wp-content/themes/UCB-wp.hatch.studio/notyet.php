<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="middle"><!-- ------------------------------------------------------------------------ MIDDLE -->

<div id="photoslid"><!-- SLIDESHOW -->

<ul class="bxslider">

 <li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/pic1.jpg" width="380" height="288"/></li>

 <li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/pic2.jpg" width="380" height="288"/></li>

 <li><img src="<?php echo get_template_directory_uri(); ?>/js/jquery/images/banner3.png" width="380" height="288"/></li>

</ul>

</div><!-- END SLIDESHOW -->

<div class="tittle" align="center"><!-- TITTLE HOME -->

<p class="font-three">自分で選べるホームスティ、シェアハウス</p><hr>

<p class="font-six">コンセプトは、オージーと楽しく安心して生活できる家。</p>

</div><!-- END HOUSE -->

<div class="wrap"><!-- WRAP -->

<div class="ib-box"><!-- BOX1 -->

<div id="house1"><!-- HOUSE１ -->

<?php

query_posts('showposts=10&cat=10');

while(have_posts()) : the_post();

?>

<?php the_post_thumbnail(); ?>

<p class="font-six"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></p><hr>

<p class="font-two"><?php echo substr(strip_tags($post-> post_content), 0, 200);?></p>

<p class="more"><a href=”” class=”more-link”>予約する</a ></p>

<?php endwhile; ?>

</div><!-- END HOUSE1 -->

</div><!-- END BOX -->

<div class="ib-box"><!-- BOX2 -->

<div id="house2"><!-- HOUSE2 -->

<?php

query_posts('showposts=10&cat=17');

while(have_posts()) : the_post();

?>

<?php the_post_thumbnail(); ?>

<p class="font-six"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></p>

<hr><p class="font-two"><?php echo substr(strip_tags($post-> post_content), 0, 200);?></p>

<p class="more"><a href=”” class=”more-link”>予約する</a ></p>

<?php endwhile; ?>

</div><!-- END HOUSE2 -->

</div><!-- END BOX -->

</div><!-- END WRAP-->

<div class="tittle" align="center"><!-- TITTLE MAGAGIN -->

<p class="font-three"></p>

<p class="font-three">面白ろマガジン</p><hr>

<p class="font-six">適当に作って書くブログです。</p>

</div><!-- END TITTLE MAGAGIN -->

<?php

query_posts('showposts=10&cat=3');

while(have_posts()) : the_post();

?>

<div class="font-seven"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></div>

<p class="post-time"><?php the_date(); ?> time :<?php the_time(); ?></p>

<p class="thimbnailtop"><?php the_post_thumbnail(); ?></p>

<p class="post-font"><?php echo substr(strip_tags($post-> post_content), 0, 200);?> 

<br/><p class="more"><img src="images/home-au_03.png" width="17" height="13" sec=""><a href=”” class=”more-link”>続きを読む</a ></p>

<hr color="#E0F8F0" size="10px">

<?php endwhile; ?>

</div><!-- ------------------------------------------------------------------------------- END MIDDLE -->

<?php get_footer(); ?>