<div class="s-title">
<img src="<?php bloginfo('template_url'); ?>/img/hotlists-tip.jpg">
</div>
<ul>
	<?php
		  $sticky = get_option('sticky_posts'); 
    rsort( $sticky );//对数组逆向排序，即大ID在前 
    $sticky = array_slice( $sticky, 0, 5);//输出置顶文章数，请修改5，0不要动，如果需要全部置顶文章输出，可以把这句注释掉 
    query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1 ) ); 
    if (have_posts()) :while (have_posts()) : the_post();    ?>
<li id="post-<?php the_ID(); ?>">
<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<div class="s-site">
<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 32,"...");  ?></div>
 </li>
<?php endwhile;?>
<?php  endif;  wp_reset_query(); ?>
</ul>
