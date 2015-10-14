<?php get_header();?>
  <section id="content">
    <div class="container">
      <div class="row">
	  <?php the_crumbs(); ?>
	  <ul class="col-md-2 col-sm-2 pagenav hidden-xs">
	 <?php wp_list_pages('title_li=&' ); ?> 
	 </ul>
	  <div class="col-md-10 page-contents col-sm-10 col-xs-12">
	    
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; ?>
<?php endif; ?>
	    </div>
		
	</div>
</div>
	</section>

  <?php get_footer();?>