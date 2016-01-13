<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>

<!-- HEAD -->

<head>

<TITLE>hatch studio - おもしろ海外情報マガジン <?php wp_title(); ?></TITLE>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<META name="description" content="おもしろ海外情報マガジン　サンフランシスコ、バークレー、シリコンバレーのおもしろ生活情報がいっぱい！！！" />

<META name="Keywords" content="アメリカ,サンフランシスコ,バークレー,シリコンバレー,サンノゼ,ロサンゼルス,ジャカルタ,ボランティア,インドネシア,UCB,UCバークレー,バークレー大学,語学,アメリカ大学,スタートアップ,IT,ミートアップ,バークレーミートアップ,meetup,日本人会,生活情報,求人,募集,留学,インターンシップ,スタンフォード,クラシファイド,現地情報" />

<!-- ここからOGP -->

<meta property="fb:admins" content="100000980770893" />
  <?php
  global $site_name;
  $site_name = Array(
    1 => "sf",
    6 => "ucberkeley",
    8 => "newyork",
    9 => 'portland',
    11 => 'ucla'
  );

  global $site_leader;
  $site_leader = Array(
    1 => 22,
    6 => 23,
    8 => 24,
    9 => 49,
    11 => 22
  )

  ?>
<?php

if (is_front_page()){

echo '<meta property="og:type" content="blog" />';echo "\n";

} else {

echo '<meta property="og:type" content="article" />';echo "\n";

}

?>

<meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />

<?php

if (is_singular() && ! is_archive() && ! is_front_page() && ! is_home()){

     if(have_posts()): while(have_posts()): the_post();

          echo '<meta property="og:title" content="'.the_title("", "", false).' - hatchstudioinc.com" />';echo "\n";

          echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'" />';echo "\n";

     endwhile; endif;

} else {

     echo '<meta property="og:title" content="'; bloginfo('name'); echo'" />';echo "\n";

     echo '<meta property="og:description" content="'; bloginfo('description'); echo '" />';echo "\n";

}

?>

<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />

<?php

$str = $post->post_content;

$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';

if (has_post_thumbnail() && ! is_archive() && ! is_front_page() && ! is_home()){

     $image_id = get_post_thumbnail_id();

     $image = wp_get_attachment_image_src( $image_id, 'full');

     echo '<meta property="og:image" content="'.$image[0].'" />';echo "\n";

} else if ( preg_match( $searchPattern, $str, $imgurl ) && ! is_archive() && ! is_front_page() && ! is_home()) {

     echo '<meta property="og:image" content="'.$imgurl[2].'" />';echo "\n";

}else if( is_front_page() || is_home() ){

     echo '<meta property="og:image" content="http://hatchstudioinc.com/wp-content/themes/wp.hatch.studio/images/logo.jpg" />';echo "\n";

} else {

     echo '<meta property="og:image" content="http://oxynotes.com/wp-content/themes/twentyten/images/default.png" />';echo "\n";

}

?>



  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lib/bootstrap-3.3.2-dist/css/bootstrap.css" media="screen" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/desktop.css" media="screen and (min-width:1025px)" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/mobile.css" media="screen and (max-width:1024px)" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.min.css" media="screen" />
  <?php if( get_current_blog_id() == 8 ){ ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/newyork.css" media="screen" />
  <?php }else if( get_current_blog_id() == 6 ){ ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ucberkeley.css" media="screen" />
  <?php }else if( get_current_blog_id() == 9 ){ ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/portland.css" media="screen" />
  <?php }else if( get_current_blog_id() == 11 ){ ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ucla.css" media="screen" />
  <?php }else { ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/sf.css" media="screen" />
  <?php } ?>
  <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />

<link href="<?php bloginfo('template_url'); ?>/js/jquery/jquery.bxslider.css" rel="stylesheet" type="text/css" />

<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css' />

<link href='http://fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Tienne:400,700' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700,900' rel='stylesheet' type='text/css'>

<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.10.1.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.jrumble.1.3.min.js"></script>

  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery/jquery.bxslider.min.js"></script>

  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lib/bootstrap-3.3.2-dist/js/bootstrap.js"></script>


  <link rel='alternate' href='<?php bloginfo('atom_url'); ?>' type='application/rss+xml' title='はっちすたじお' />
  <link rel='alternate' href='<?php bloginfo('rss2_url'); ?>' type='application/rss+xml' title='はっちすたじお' />

<!-- ここからGoogle Analytics -->

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52447507-1', 'auto');

  ga('send', 'pageview');

</script>

</head>

<?php wp_head(); ?>

<body><!--- BODY -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5&appId=650457541700749";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

