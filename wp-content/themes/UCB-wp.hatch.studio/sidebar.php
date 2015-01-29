<div id="right-side"><!--RIGHT SIDE -->

<div class="title-icon"><span class="sub-title">About</span></div>
<dl class ="about">
   <dt>UCバークレー
       </br>大学とは？</dt>
   <dd>ヒッピー文化の発祥の地に位置し、世界的に有名な学生運動がおこったUCバークレー大学はアメリカの名門大学の中でも最もリベラルな校風として知られ、世界中からユニークで自由な学生が集まる。研究などの分野において数多くのノーベル賞受賞者を輩出する名門大学である。</dd>
   <dd><a href="http://takuyasuzuki0403.wix.com/berkeley#!news-and-events/c16s4">＋More Read</a></dd>
</dl>

<div class="title-icon"><span class="sub-title">Interviewer</span></div>
<ul class="Authors-list">
<?php
 // 表示する順番にユーザーIDを設定する
 $this_authors = array(23, 31, 38, 32, 35);
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

    <div class="title-icon"><span class="sub-title">UCB関連Link</span></div>
    <ul class="link">
        <li><a href="http://studyabroadberkeley.blogspot.com/" target="_blank">ぼくのやったことin Berkeley</a></li>
        <li><a href="http://haasjapan.wordpress.com/" target="_blank">Haas日本人向けサイト</a></li>
        <li><a href="http://www.ocf.berkeley.edu/~cjc/" target="_blank">Cal Japan Club </a></li>
        <li><a href="http://www.ocf.berkeley.edu/~jgrb/" target="_blank">JGRB</a></li>
        <li><a href="http://www.ocf.berkeley.edu/~nsu/" target="_blank">Nikkei Student Union</a></li>
        <li><a href="http://www.berkeleyjapan.net/" target="_blank">バークレー日本人同窓会</a></li>
        <li><a href="http://ihouse.berkeley.edu/" target="_blank">インターナショナルハウス</a></li>
    </ul>




<div class="title-icon"><span class="sub-title">new members</span></div>
<dl class="new-members">
    <dt>UCバークレー生徒で</br>一緒にインタビューし</br>てくれる人募集！</dt>
    <dd class="man-icon-img"><img src="<?php echo get_template_directory_uri(); ?>/images/man-icon_15.png"></dd>
    <dd>インタビューを通して面白い人達と会えるいいチャーンス！興味がある方は<a href="https://www.facebook.com/takuya.suzuki2" target="_blank">takuya'Facebook</a>にメッセージを下さい。</dd>

</dl>

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

</div>