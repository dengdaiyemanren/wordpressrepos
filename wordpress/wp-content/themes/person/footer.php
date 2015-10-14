<footer id="footer">
<div class="container inner-footer">
<div class="row">
<div class="col-md-6 col-sm-6 ">
<div class="f-logo">
<?php if (get_option('cx_title') == 'logo') { ?>
<h1 class="flogo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
<?php } else { ?>
<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php } ?>
</div>
<div class="copyr">
<p>Copyright © 2015 <?php bloginfo('name')?> All Rights Reserved<?php echo stripslashes(get_option('cx_track')); ?> </p>
<p><?php echo stripslashes(get_option('cx_icp')); ?></p>
</div>
</div>
<div class="col-md-6 col-sm-6 hidden-xs">
<?php wp_nav_menu( array( 'theme_location' => 'footer-nav', 'fallback_cb' => 'footer_menu','menu_class'=>'footer-menu' ,'container' => 'nav','container_class' => 'footer-nav hidden-xs') ); ?>
<div class="us right">
<a class="weibo"  href="<?php echo stripslashes(get_option('cx_weibo')); ?>" target="_blank"><i class="fa fa-weibo fa-4"></i></a>
<a class="qq" href="<?php bloginfo('template_url'); ?>/img/qq.png"><i class="fa fa-qq fa-4"></i></a>
<a class="weixin" href="<?php bloginfo('template_url'); ?>/img/weixin.png"><i class="fa fa-weixin fa-4"></i></a>
</div>
<div class="comp right">
<span>合作伙伴：</span>
<a href="http://www.seo628.com" target="_blank"> 小兽SEO</a>
</div>
</div>
<?php if ( is_home() ) { ?>
<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-6' ); ?>
<?php else: ?>	
<?php wp_list_bookmarks('categorize=0&title_before=<h3 class="widget-title">&title_after=</h3>&category_before=<div class="friendLink col-sm-12">&category_after=</div>&show_images=0&title_li=友情链接&'); ?>
<?php endif; ?>
 <?php } ?>
</div>
</div>
</footer>
<div id="shangxia">
       <div id="shang" title="↑ 返回顶部"></div>
       <?php if ( is_singular() ){ ?>
       <div id="comt" title="查看评论"></div>
       <?php } ?>
       <div id="xia" title="↓ 移至底部"></div>
</div>
<?php wp_footer(); ?>
</body>
</html>
