<?php get_header(); ?>	<div id="primary" class="site-content">		<div id="content" role="main" class="border-page-2 border-page-1">			<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>			<?php while ( have_posts() ) : the_post(); ?>				<?php get_template_part( 'template', 'page' ); ?>			<?php endwhile; ?>		</div>	<?php comments_template( '', true ); ?>	</div><?php get_sidebar(); ?><?php get_footer(); ?>