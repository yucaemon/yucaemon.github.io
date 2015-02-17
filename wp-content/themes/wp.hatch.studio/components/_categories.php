<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <!--a class="navbar-brand" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" height="30" /></a-->
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav category">
        <li>
            <a href="/">HOME</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">LOCATIONS</a>
            <ul class="dropdown-menu" role="menu">
                <?php
                   preg_match('/[^\/.]+\.[^.]+$/',site_url(),$match);
                   $site_domain = $match[0]
                ?>
                <li><a href='http://<?php echo $site_domain ?>'>San Francisco</a></li>
                <li><a href='http://ucberkeley.<?php echo $site_domain ?>/'>UC BERKELEY</a></li>
                <li><a href='http://newyork.<?php echo $site_domain ?>/'>NEW YORK</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORIES</a>
          <?php include(TEMPLATEPATH . '/components/categories/_' . $site_name[get_current_blog_id()] . '.php'); ?>
        </li>
        <li>
          <a href="/authors">ABOUT</a>
        </li>
        <li class="ranking">
          <a href="/ranking">RANKING</a>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right social">
      <li>
        <a class="twitter" href="https://www.facebook.com/hatchsudioinc" target="_blank" title="twitter">
          <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
          </span>
        </a>
      </li>
      <li>
        <a class="twitter" href="https://twitter.com/hatchstudioinc" target="_blank" title="twitter">
          <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
          </span>
        </a>
      </li>
    </ul>
  </div>

  <?php if (!is_user_logged_in()) : ?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {

        var js, fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id)) return;

        js = d.createElement(s); js.id = id;

        js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";

        fjs.parentNode.insertBefore(js, fjs);

      }(document, 'script', 'facebook-jssdk'));</script>

  <?php endif; ?>

</div>