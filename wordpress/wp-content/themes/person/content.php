<?php if ( is_home() || is_category() || is_tag() || is_month() || is_author() || is_day() || is_month() || is_year() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<figure class="thumbnail"> 
	<span class="sort hidden-xs"><?php the_category( ', ' ) ?></span>
<?php if (get_option('cx_thumbnail') == 'true') { ?>
			<?php } else { ?>
            <?php get_template_part( 'inc/thumbnail' ); ?>
			<?php } ?>
		</figure>
		<div class="entry-content">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="entry-site">
				<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 190,"...");  ?></div>
	
				<div class="entry-meta">
				<div class="tags"><i></i><?php the_tags('','',''); ?></div>
		    <div class="time"><i></i> <a href="javascript:void(0);"><?php the_time('Y /n/j G:H'); ?></a></div>
			
			<div class="comments hidden-xs"><i class="fa fa-comments fa-1"></i><?php comments_popup_link( '沙发', '评论 1 条', '评论 % 条' ); ?></div>
			
			
		</div>
		</div>
	


</article>
<?php endif; ?>
<?php if ( is_single() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="single-header">
		<h1><?php the_title(); ?></h1>
			<div class="single-meta">
				<div class="tags"><i></i><?php the_tags('','',''); ?></div>
		    <div class="time"><i></i> <a href="javascript:void(0);"><?php the_time('Y /n/j G:H'); ?></a></div>
			<?php If (in_array( 'wp-postviews/wp-postviews.php',
apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){?><div class="eye hidden-xs"><i class="fa fa-eye fa-1"></i><a href="javascript:void(0);"><?php the_views();?></a> </div><?php };?>
			<div class="comments hidden-xs"><i class="fa fa-comments fa-1"></i><?php comments_popup_link( '沙发', '评论 1 条', '评论 % 条' ); ?></div>
			
			
		</div>
		<!-- .entry-meta -->
	</header>
	<!-- .single-header -->

	<div class="single-main">
		<?php the_content(); ?>
		<div class="pageShenming">
【本文版权归<?php bloginfo('name')?>所有，未经许可不得转载。文章仅代表作者看法，如有不同观点，欢迎添加<?php bloginfo('name')?>微信公众号（微信号：）进行交流。】</div>
		</div>
	<!-- .single-content -->
	<?php if (get_option('cx_share') == 'true') { ?>
	<?php get_template_part( 'inc/share' ); ?>
    <?php } ?>
	<div class="author">
<div id="author-img">
<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '80' ); }?>
<div class="au-name">
                            <a href="javascript:void(0);"><?php the_author_nickname(); ?></a><br>
                            <a class="au-title">总共<?php the_author_posts(); ?>篇文章</a>
                        </div>
</div>
	<div class="author-word"><img src="http://www.leiphone.com/images/article/dot_03.png" alt=""><?php the_author_description(); ?><img src="http://www.leiphone.com/images/article/dot_07.png" alt=""></div>
	</div>
<?php dynamic_sidebar( 'sidebar-4' ); ?>
</article>

<?php endif; ?>
<?php if ( is_page() ) : ?>
<article id="post-<?php the_ID(); ?>">
	<header class="page-header">
		<h1><?php the_title(); ?></h1>
		<!-- .entry-meta -->
	</header>
	<!-- .single-header -->

	<div class="single-main">
		<?php the_content(); ?>
	</div>
	<!-- .single-content -->
</article>
<?php endif; ?>
<?php if ( is_search() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="main-content">
		<div class="single-content">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="single-main">
					<?php the_excerpt() ?>
				</div>
	
		
		</div>
		</div>
	<div class="entry-meta">
				<div class="tags"><i></i><?php the_tags('','',''); ?></div>
		    <div class="time"><i></i> <a href="javascript:void(0);"><?php the_time('Y /n/j G:H'); ?></a></div>
			
			<div class="comments"><i class="fa fa-comments fa-1"></i><?php comments_popup_link( '沙发', '评论 1 条', '评论 % 条' ); ?></div>
			
			
		</div>

</article>
<?php endif; ?>