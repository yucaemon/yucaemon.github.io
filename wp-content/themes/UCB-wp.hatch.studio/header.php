<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>

<!-- HEAD -->

<head>

    <TITLE>hatch studio - おもしろ情報マガジン <?php wp_title(); ?></TITLE>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <META name="description" content="おもしろ情報マガジン　サンフランシスコ、バークレー、シリコンバレーのおもしろ生活情報がいっぱい！！！"/>

    <META name="Keywords"
          content="アメリカ,サンフランシスコ,バークレー,シリコンバレー,サンノゼ,ロサンゼルス,ジャカルタ,ボランティア,インドネシア,UCB,UCバークレー,バークレー大学,語学,アメリカ大学,スタートアップ,IT,ミートアップ,バークレーミートアップ,meetup,日本人会,生活情報,求人,募集,留学,インターンシップ,スタンフォード,クラシファイド,現地情報"/>

    <!-- ここからOGP -->

    <meta property="fb:admins" content="100000980770893"/>

    <?php

if (is_front_page()){

echo '<meta property="og:type" content="blog" />';echo "\n";

    } else {

    echo '
    <meta property="og:type" content="article"/>
    ';echo "\n";

    }

    ?>

    <meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"/>

    <?php

if (is_singular() && ! is_archive() && ! is_front_page() && ! is_home()){

     if(have_posts()): while(have_posts()): the_post();

          echo '<meta property="og:title" content="'.the_title("", "", false).' - hatchstudioinc.com" />';echo "\n";

    echo '
    <meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'"/>
    ';echo "\n";

    endwhile; endif;

    } else {

    echo '
    <meta property="og:title" content="'; bloginfo('name'); echo'"/>
    ';echo "\n";

    echo '
    <meta property="og:description" content="'; bloginfo('description'); echo '"/>
    ';echo "\n";

    }

    ?>

    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>

    <?php

$str = $post->post_content;

    $searchPattern = '/
    <img.
    *?src=(["\'])(.+?)\1.*?>/i';

    if (has_post_thumbnail() && ! is_archive() && ! is_front_page() && ! is_home()){

    $image_id = get_post_thumbnail_id();

    $image = wp_get_attachment_image_src( $image_id, 'full');

    echo '
    <meta property="og:image" content="'.$image[0].'"/>
    ';echo "\n";

    } else if ( preg_match( $searchPattern, $str, $imgurl ) && ! is_archive() && ! is_front_page() && ! is_home()) {

    echo '
    <meta property="og:image" content="'.$imgurl[2].'"/>
    ';echo "\n";

    }else if( is_front_page() || is_home() ){

    echo '
    <meta property="og:image" content="http://hatchstudioinc.com/wp-content/themes/wp.hatch.studio/images/logo.jpg"/>
    ';echo "\n";

    } else {

    echo '
    <meta property="og:image" content="http://oxynotes.com/wp-content/themes/twentyten/images/default.png"/>
    ';echo "\n";

    }

    ?>

    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen"/>

    <link href="js/jquery/jquery.bxslider.css" rel="stylesheet" type="text/css"/>

    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'/>

    <link href='http://fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Tienne:400,700' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700,900' rel='stylesheet'
          type='text/css'>

    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico"/>

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.10.1.min.js"></script>

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.jrumble.1.3.min.js"></script>

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery/jquery.bxslider.min.js"></script>

    <!-- ここからGoogle Analytics -->

    <script>

        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {

                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),

                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)

        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-52447507-1', 'auto');

        ga('send', 'pageview');

    </script>

</head>

<?php wp_head(); ?>

<body><!--- BODY -->

<?php if (!is_user_logged_in()) : ?>

<div id="fb-root"></div>

<script>(function (d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];

    if (d.getElementById(id)) return;

    js = d.createElement(s);
    js.id = id;

    js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";

    fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

<?php endif; ?>

<div id="container"><!-- CONTAINER -->

    <div id="contents"><!-- CONTENTS -->

        <div id="navi"><!-- NAVI -->


            <ul class="head-categories">

                <li>
                    <div class="text-tit">
                    <p class="head-categories-title"><a href="http://hatchstudioinc.com/">San Francisco</a></p>
                    <p class="head-categories-subtitle"><a href="http://hatchstudioinc.com/">サンフランシスコ　面白まがじん</a></p>
                    </div>
                    <div class="head-categories-img"><a href="http://hatchstudioinc.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/sf-head-icon.png"></a></div>
                </li>

                <li>
                    <div class="text-tit">
                        <p class="head-categories-title"><a href="<?php echo home_url(); ?>">UC Berkeley</a></p>
                        <p class="head-categories-subtitle"><a href="<?php echo home_url(); ?>">UCバークレー　面白インタビュー</a></p>
                    </div>
                    <div class="head-categories-img"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/ucb-head-icon.png"></a></div>
                </li>

            </ul>



            <div class="top-facebook">

                <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fhatchsudioinc%3Ffref%3Dts&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowtransparency="true"></iframe>

            </div>



            <div class="clear-both"></div>

        </div>
        <!-- END NAVI -->
