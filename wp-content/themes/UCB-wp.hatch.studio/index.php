<?php get_header(); ?>

<?php get_sidebar(2); ?>

<div id="center"><!-- CENTER -->

<div class="title"><!-- TITLE -->

<a href="<?php echo home_url(); ?>"><h1>U<span class="first-c">C</span> B<span class="e">e</span>rkeley</h1></a>

<h2>UCバークレー大学の面白インタビュー</h2>

<p class="subtitle">名門UCバークレー大学にいる人達はどんな人たちがいるの？？ </br>

という素朴な疑問にお答えして、現役UCバークレー生徒でもあり、自身も面白い経歴をもつ男”Takuya”を中心にUCバークレー大学にいる面白い人達をインタビューしていきます〜♪</p>

<div id="top-sf"><img src="<?php echo get_template_directory_uri(); ?>/images/UCB.png"></div>

<p class="date">08.28</p>

<p class="explanation">にオープンしました。<br>面白人間あつまれ！！</p>

</div><!--END TITLE -->

<div class="clear-both"></div>

<div id="Column">

<div id="interview">

<p class="bigtitle"><span class="big">i</span>nter<span class="big">v</span>iew</p>

<p class="smailtitle">シリコンバレー、バークレーを中心に面白い事をやっている人たちにインタビューしてみる。</p>

<div class="clear-both"></div>

<div class="interview-left">

<p class="name">No1. 田中 秀司</br>SHUJI TANAKA</p>

<img src="<?php echo get_template_directory_uri(); ?>/images/focus.png" class="focus">

<img src="<?php echo get_template_directory_uri(); ?>/images/interview/shujiT.jpg" class="interview-face-photo">

<p class="interview-title">comming soon!!!</br>全てはキャリアため。シリコンバレーでインタビューしまくる。</p>

</div>

<div class="interview-right">

<p class="name">No2. 横本　翔一郎</br>SEAN YOKOMOTO</p>

<img src="<?php echo get_template_directory_uri(); ?>/images/focus.png" class="focus">

<img src="<?php echo get_template_directory_uri(); ?>/images/interview/seanY.jpg" class="interview-face-photo">

<p class="interview-title">comming soon!!!</br>UCバークレーでのスタートアップの活動の原点。</p>

</div>

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

</div>

<div class="pickup-text">

<h4><a href="<?php the_permalink() ?>"rel="bookmark"><?php the_title(); ?></a></h4>

<div class="pickup-paragraph">

<p class="post-text"><a href="<?php the_permalink() ?>"rel="bookmark"><?php echo mb_substr(strip_tags($post-> post_content),0,130).'...'; ?></p>

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