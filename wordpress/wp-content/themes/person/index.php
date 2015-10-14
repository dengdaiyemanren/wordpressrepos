<?php get_header();?>
<section id="content">
<div class="container">
  <div class="row">
	<div class="col-md-8">
	<div class="row">
  <div class="col-md-8 slider hidden-xs hidden-sm">
  <?php get_template_part( 'inc/slider' ); ?>
  </div>
  <div class="col-md-4 sticky">
  <?php if ( !is_paged() ) { ?>
	<?php if ( is_sticky() ) { ?><?php get_template_part( 'inc/sticky' ); ?><?php }else { ?>
	<div class="s-title">
<img src="<?php bloginfo('template_url'); ?>/img/hotlists-tip.jpg">
</div>
<ul>
	<?php
    query_posts('orderby=comment_count&showposts=5' ); 
    while (have_posts()) : the_post();    ?>
<li id="post-<?php the_ID(); ?>">
<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<div class="s-site">
<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 40,"...");  ?></div>
 </li>
 <?php endwhile;?>
 </ul>
 <?php } ?>
<?php } ?>
  </div>
  </div>
   <div class="content-ajax">
	<div class="tip">
					<h4><span class="yel">最新</span><span class="gra">资讯</span></h4>
					<div class="count">
						<i></i>
						今日更新<strong><?php $today = getdate();
$total_posts = new WP_Query( 'year=' . $today["year"] . '&monthnum=' . $today["mon"] . '&day=' . $today["mday"] . '&posts_per_page=1' );
echo $total_posts->found_posts;?></strong>篇
						<em></em>
					</div>
				</div> 

<?php
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$sticky = get_option( 'sticky_posts' );
	$args = array(
		'post__not_in' => $sticky,
		'paged' => $paged
	);
	query_posts( $args );
?>
	<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; ?>
<?php else : ?>
<article>
<h2 class="entry-title">目前还没有文章！</h2>
<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/post-new.php">点击这里发布您的第一篇文章</a></p>
</article>
<?php endif; ?>
</div>
<nav class="page-nav"><?php next_posts_link(__('点击更多')); ?></nav>
</div>
<div class="col-md-4 sidebar hidden-xs hidden-sm">
<?php get_sidebar();?>
</div>
</div>
</div>
</section>
<?php get_footer();?>