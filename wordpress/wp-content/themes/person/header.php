<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="renderer" content="webkit">
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no">
	<meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <?php get_template_part( 'inc/seo' ); ?>
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script> 
	 <script type="text/javascript" src="http://www.tmtpost.com/wp-content/themes/bvtmt/static/js/vendor/jquery.popupoverlay.js"></script>
	<link rel='stylesheet'  href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" type='text/css' media='all' /> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
 <header id="header">
 <div class="top">
 <div class="container">
  <?php get_template_part( 'inc/logo' ); ?>
  <?php wp_nav_menu( array( 'theme_location' => 'top-nav', 'fallback_cb' => 'top_menu','menu_class'=>'menu-top-nav' ,'container' => 'nav','container_class' => 'top-nav hidden-xs hidden-sm') ); ?>
 
  <div class="login hidden-xs">
<div class="img"><?php echo get_avatar( get_the_author_email(), '32' ); ?></div>
<div class="logindiv"><?php if ( !$user_ID )  { ?>
<a href="<?php echo get_option('siteurl'); ?>/wp-login.php" title="Log in" target="_blank">登录</a>
<?php } else { ?>
<a href="<?php echo get_option('siteurl'); ?>/wp-admin/" title="管理" target="_blank">管理</a><?php } ?></div>
  </div>
   <div class="top-search hidden-xs">
  <?php get_search_form(); ?></div>
  <div class="menu-button visible-xs">
				<i class="fa fa-bars fa-3x"></i>
			</div>
</div>
</div>
  <?php wp_nav_menu( array( 'theme_location' => 'header-nav', 'fallback_cb' => 'default_menu','menu_class'=>'header-menu-nav container' ,'container'       => 'nav','container_class' => 'header-nav hidden-xs','after'=>'<em></em>') ); ?>
   <div class=" fixed hidden-xs "><div class="container"><?php wp_nav_menu( array( 'theme_location' => 'header-nav', 'fallback_cb' => 'default_menu','menu_class'=>'header-menu-nav' ,'container'       => 'nav','container_class' => 'header-nav','before'=>'<i></i>','after'=>'<em></em>') ); ?><div class="top-search hidden-xs">
  <?php get_search_form(); ?></div></div></div>
   <?php wp_nav_menu( array( 'theme_location' => 'mini-nav', 'fallback_cb' => 'mini_menu','menu_class'=>'menu-mini-nav' ,'container'       => 'nav','container_class' => 'mini-nav visible-xs','before'=>'<i></i>','after'=>'<em></em>') ); ?>
  </header>
 