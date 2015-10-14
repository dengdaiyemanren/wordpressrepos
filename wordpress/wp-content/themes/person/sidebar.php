<aside class="date">
<div class="si-title"><h2><?php echo get_option('cx_mc');?></h2></div>
	<ul>

	<?php 
 $date=explode(",",get_option('cx_date'));
	$args = array(
    'posts_per_page' => 5,      // 显示多少条
    'paged' => $paged,           // 当前页面
    'orderby' => 'date',         // 时间排序
    'order' => 'desc',           // 降序（递减，由大到小）    
    'ignore_sticky_posts' => 1	,
	'post__not_in' => array($post->ID) ,
    'category__in' => $date,
);
query_posts($args);
while (have_posts()) : the_post();?>
<li> <a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title(); ?>"><div class="time"><?php the_time('G:H'); ?></div><p><?php the_title(); ?></p></a></li>
  <?php endwhile;?>
  </ul>
 </aside>

   <?php wp_reset_query(); ?>

<?php if (get_option('cx_g-sidebar-top') == 'true') { ?>
		<?php } else { ?>
			<?php get_template_part( 'inc/ad/ad-sidebar-top' ); ?>
		<?php } ?>
	
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php else: ?>	 <?php get_template_part( 'inc/functions/jd' ); ?>
  <?php get_template_part( 'inc/functions/bj' ); ?>
  <?php get_template_part( 'inc/functions/tw' ); ?>
	<?php endif; ?>
<?php if (get_option('cx_g-sidebar-bot') == 'true') { ?>
		<?php } else { ?>
			<?php get_template_part( 'inc/ad/ad-sidebar-bot' ); ?>
		<?php } ?>
