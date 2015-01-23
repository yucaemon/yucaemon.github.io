<div id="navi"><!-- NAVI -->

  <ul class="head-categories">

    <li class="hatchstudio">
      <div class="text-tit">
        <p class="head-categories-title"><a href="<?php echo home_url(); ?>">San Francisco</a></p>
        <p class="head-categories-subtitle"><a href="<?php echo home_url(); ?>">サンフランシスコ　面白まがじん</a></p>
      </div>
      <div class="head-categories-img"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/sf-head-icon.png"></a></div>
    </li>

    <li class="ucb">
      <div class="text-tit">
        <p class="head-categories-title"><a href="http://ucberkeley.hatchstudioinc.com/">UC Berkeley</a></p>
        <p class="head-categories-subtitle"><a href="http://ucberkeley.hatchstudioinc.com/">UCバークレー　面白インタビュー</a></p>
      </div>
      <div class="head-categories-img"><a href="http://ucberkeley.hatchstudioinc.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/ucb-head-icon.png"></a></div>
    </li>

  </ul>

  <?php if (!preg_match('~Windows|MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT'])) : ?>

    <ul class="social-icons">

      <li><a href="https://www.facebook.com/hatchsudioinc?fref=ts" target="_blank"><span class='symbol'></span></a></li>

      <li><a href="https://twitter.com/hatchstudioinc" target="_blank"><span class='symbol'></span></a></li>

      <li><a href="" target="_blank"><span class='symbol'></span></a></li>

      <li><a href="" target="_blank"><span class='symbol'></span></a></li>

      <li><a href="http://www.meetup.com/JapaneseMeetupBerkeley/" target="_blank"><span class='symbol'></span></a></li>

      <li><a href="" target="_blank"><span class='symbol'></span></a></li>

    </ul>

  <?php endif; ?>

  <div class="clear-both"></div>

</div><!-- END NAVI -->

