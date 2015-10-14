<div id="sticky">
<div class="s-title">
        <h2>最新要闻</h2>
<!--        <a href="#" class="more">查看更多-></a>-->
    </div>
	<?php
		$args = array(
			'posts_per_page' => get_option('cx_sticky_cat_n'),
			'post__in'  => get_option( 'sticky_posts' ),
		);
		query_posts($args);
	?>
	<?php while (have_posts()) : the_post(); ?>
	 
<article id="post-<?php the_ID(); ?>">
           <div class="main-cont">
	<figure class="thumbnail hidden-xs"> 
	
					<?php the_post_thumbnail('s-thumb');  ?>
				
		</figure>
		<div class="s-content">
		<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<div class="s-site"><?php if (has_excerpt()){ ?>
					<?php the_excerpt() ?>
				<?php } else { echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 32,"..."); } ?></div>
	
		
		</div>
		</div>
             
            </article>
			
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
</div>