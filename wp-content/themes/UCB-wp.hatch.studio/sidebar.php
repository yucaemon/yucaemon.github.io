<div id="right-side"><!--RIGHT SIDE -->

<div class="title-icon"><span class="sub-title">About</span></div>

<div class ="about">

<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">

<div class="description">

<p>

はっちすたじおとは主にバークレーを拠点とした、北カリフォルニアで暮らす頑張る若者達が、分け隔てなく自由に出会えて遊べる場所があったらなーと思って作ったすたじおです。

そんな仲間たちが情報をシェアする為に日々の生活情報を発信すれば、楽しんじゃね？便利じゃね？って感じのただの好奇心から作りました。

</p>

<p>

ここアメリカから、たくさんの”新しい面白情報”を日本や現地のみんなに発信！お届けできたら嬉しいです。6/28/2014 

</p>

</div>

</div>

<div class="title-icon"><span class="sub-title">Authors</span></div>

<ul class="Authors-list">

<?php 

 // 表示する順番にユーザーIDを設定する

 $this_authors = array(23);

?>

<?php foreach ($this_authors as $this_author_id ) { ?>

<li>

  <a href="<?php echo get_author_posts_url($this_author_id)?>"><img src="/wp-content/uploads/userphoto/<?php echo $this_author_id ?>.thumbnail.jpg"></a>

  <dl>

    <dt><a href="<?php echo get_author_posts_url($this_author_id)?>"><?php echo get_the_author_meta( 'first_name', $this_author_id ); ?></a></dt>

    <dd><a href="<?php echo get_author_posts_url($this_author_id)?>"><?php echo get_the_author_meta( 'description', $this_author_id ); ?></a></dd>

 </dl>

  <div class="clear-both"></div>

</li>

<?php } ?>

</ul>

<div class="clear-both"></div>

<div class="title-icon"><span class="sub-title">popular</span></div>

<ul class="popular">

<?php

query_posts('showposts=10&cat=2');

while(have_posts()) : the_post();

?>

<li>

<div class="popular-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(60,60)); ?></a></div>

<div class="popular-text">

<p class ="popular-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

<!-- p class="popular-paraglah"><?php echo substr(strip_tags($post-> post_content), 0, 200);?></p -->

</div>

<div class="clear-both"></div>

</li>

<?php endwhile; ?>

</ul>

<!-- ?php dynamic_sidebar(); ? -->

<div class="title-icon"><span class="sub-title">twitter</span></div>

<div class="twitter">

<a class="twitter-timeline" href="https://twitter.com/hatchstudioinc" data-widget-id="480117151240433665">@hatchstudioinc からのツイート</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>

<div class="facebook">

<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fhatchsudioinc%3Ffref%3Dts&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>

<iframe src="//www.facebook.com/plugins/facepile.php?app_id&amp;href=https%3A%2F%2Fwww.facebook.com%2Fhatchsudioinc%3Ffref%3Dts&amp;action&amp;width=230px&amp;height&amp;max_rows=1&amp;colorscheme=light&amp;size=medium&amp;show_count=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:230px;" allowTransparency="true"></iframe>

</div>