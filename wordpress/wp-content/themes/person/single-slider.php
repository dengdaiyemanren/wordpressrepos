<?php get_header();?>
  <section id="content">
    <div class="container">
      <div class="row">
	
	  <div class="col-md-8 page-content">
	    <?php the_crumbs(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php if (get_option('cx_g-comment') == 'true') { ?>
		<?php } else { ?>
			<?php get_template_part( 'inc/ad/ad-comment' ); ?>
		<?php } ?>
<?php comments_template( '', true ); ?>
	    </div>
		
<div class="col-md-4 sidebar hidden-xs hidden-sm">
<?php get_sidebar('content');?>
</div>
	</div>
</div>
	</section>

  <?php get_footer();?>