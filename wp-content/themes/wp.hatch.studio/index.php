<?php get_header(); ?>

<?php get_Sidebar(2); ?>

<div id="center"><!-- CENTER -->


<div id="header"><!-- HEADER -->

<div class="title"><!-- TITLE -->

<h1><a href="<?php echo home_url(); ?>">S<span class="first-a">a</span>n Fr<span class="second-a">a</span>n<span class="c">c</span>isco</a></h1>


<h2>現地密着まがじん。</h2>

<p class="subtitle">はっちすたじおは、北カリフォルニアのバークレーを拠点にサンフラ、サンノゼ、シリコンバレーでやんちゃにくらす現地のやつらが適当につくる情報共有WEBまがじんです。</p>


<div id="top-sf"><img src="<?php echo get_template_directory_uri(); ?>/images/top-sf.png"></div>


<p class="date">06.28</p>

<p class="subtitle">にオープンしました。<br>北カリフォルニアの若者集まれ！</p>

<div class ="event">

<div class ="coming-event">

<h3><span class="sub-title">イベント予定</span></h3>

<ul>
<li><a href="http://www.meetup.com/JapaneseMeetupBerkeley/events/191555892/"><time>2014/未定</time> <span>第5会目バークレー若者会開催予定！</span></a></li>

</ul>

</div>

<div class ="future-event">

<h3> → 過去のイベント探検隊レボ</h3>

<ul>

<li><a href="http://hatchstudioinc.com/archives/2589"><time>2014/04/19</time> 第四回、バークレー若者会しました！</a></li>

<li><a href="http://www.meetup.com/JapaneseMeetup2014/"><time>2014/07/07</time> Berkeley Meetup(英語)しました！</a></li>

<li><a href="http://hatchstudioinc.com/?p=430"><time>2014/04/27</time> はっち会、寿司会しました！</a></li>

</ul>
</div>

</div><!--END TITLE -->

</div><!-- END HEADER -->

<div class="clear-both"></div>

</div>



<ul class="pickup">

<?php

query_posts('showposts=12&cat=-22&posts_per_page=1&paged='.$paged);

while(have_posts()) : the_post();

?>

<li>

<div class="pickup-img"><a href="<?php the_permalink() ?>"rel="bookmark">

<?php

  if ( has_post_thumbnail() ) :

    the_post_thumbnail(); 

  else : 

?>

<img src="<?php echo get_template_directory_uri(); ?>/images/NoImg.png" class="attachment-post-thumbnail">

<?php

endif;

?>
</a>
</div>

<div class="pickup-text">

<h4><a href="<?php the_permalink() ?>"rel="bookmark"><?php the_title(); ?></a></h4>

<div class="pickup-paragraph">

<p class="post-text"><a href="<?php the_permalink() ?>"rel="bookmark"><?php echo mb_substr(strip_tags($post-> post_content),0,130).'...'; ?></a></p>

</div>

<div class="clear-both"></div>

<div class="mini-info">

<span class="sub-title"><?php echo time_ago(); ?></span>

<span class="category-name">カテゴリ：<?php the_category(', '); ?></span>

</div>

<a href="<?php echo get_author_posts_url( get_the_author_ID() )?>">

<div class="pickup-authors"><?php userphoto_the_author_photo() ?></div>

</a>

</div>

<div class="clear-both"></div>

</li>

<?php endwhile; ?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

</ul>

<div class="clear-both"></div>

<ul class="articles">

<?php query_posts('showposts=16&cat=-22&offset=12');

if (have_posts()) : while (have_posts()) : the_post(); ?>

<li>

<p class="thimbnailtop"><a href="<?php the_permalink() ?>"rel="bookmark">

<?php

  if ( has_post_thumbnail() ) :

    the_post_thumbnail(); 

  else : 

?>

<img src="<?php echo get_template_directory_uri(); ?>/images/NoImg.png" class="attachment-post-thumbnail">

<?php

endif;

?>

</a></p>

<p class="post-tit">

<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php

 if(mb_strlen($post->post_title)>20) { $title= mb_substr($post->post_title,0,25) ; echo $title. ･･･ ;

} else {echo $post->post_title;}?>

</a>

</p>

<p class="post-text">

<a href="<?php the_permalink() ?>"rel="bookmark"><?php echo mb_substr(strip_tags($post-> post_content),0,30).'...'; ?></a>

</p>

<div class="post-authors">

<a href="<?php echo get_author_posts_url( get_the_author_ID() )?>"><?php userphoto_the_author_photo() ?></a></div>

<div class="mini-info">

<p class="sub-title"><?php echo time_ago(); ?></p>

<p class="category-name">カテゴリ：<?php the_category(', '); ?></p>

</div>

</li>

<?php endwhile; endif; wp_reset_query(); ?>

<div class="clear-both"></div>

</ul>

</div><!-- END Column -->

</div><!-- CENTER -->

<?php get_Sidebar(); ?>

</div><!-- END contents -->

<div class="clear-both"></div>

</div><!-- END container -->

</div>

<?php get_footer(); ?>