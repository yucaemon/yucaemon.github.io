<div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo home_url(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="70">
    </a>

  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav category">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">location<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href='http://hatchstudioinc.com/'>San Francisco</a></li>
                <li><a href='http://ucberkeley.hatchstudioinc.com/'>UC BERKELEY</a></li>
                <li><a href='http://hatchstudioinc.com/'>NEW YORK</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">categories<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo get_category_link('5'); ?>">EAT</a></li>
                <li><a href="<?php echo get_category_link('6'); ?>">GO</a></li>
                <li><a href="<?php echo get_category_link('1'); ?>">COOK</a></li>
                <li><a href="<?php echo get_category_link('4'); ?>">BUY</a></li>
                <li><a href="<?php echo get_category_link('18'); ?>">NEWS</a></li>
                <li><a href="<?php echo get_category_link('8'); ?>">MEMO</a></li>
                <li><a href="<?php echo get_category_link('9'); ?>">MEET</a></li>
                <li><a href="<?php echo get_category_link('3'); ?>">STUDY</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">authors<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo get_author_link('5'); ?>">HACHICO</a></li>
                <li><a href="<?php echo get_author_link('6'); ?>">HANAE</a></li>
                <li><a href="<?php echo get_author_link('1'); ?>">KYOKO</a></li>
                <li><a href="<?php echo get_author_link('4'); ?>">YUKARI</a></li>
                <li><a href="<?php echo get_author_link('18'); ?>">MAYUMI</a></li>
            </ul>
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